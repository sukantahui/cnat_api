<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;
use App\Http\Requests\StoreCourseBasicRequest;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseWithStudentsResource;

class CourseController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::get();
        return ResponseHelper::success("Course created successfully", CourseResource::collection($courses));
    }
    public function courseWithDetails()
    {
        $courses = Course::with('details')->get();

        return ResponseHelper::success(
            "Course list fetched successfully",
            CourseResource::collection($courses)
        );
    }


    public function store(StoreCourseRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {

            $course = Course::create([
                'course_code' => $request->course_code,
                'course_name' => $request->course_name,
                'fee_modes_id' => $request->fee_modes_id ?? 1,
                'course_fees' => $request->course_fees ?? 0,
                'fees_valid_up_to' => $request->fees_valid_up_to,
                'upcoming_fees' => $request->upcoming_fees,
            ]);

            $course->details()->createMany($request->topics);

            $course->load('details');

            return ResponseHelper::success(
                "Course created successfully",
                new CourseResource($course),
                201
            );
        }, [
            'action' => 'create_course',
            'course_code' => $request->course_code
        ]);
    }
    public function storeBasic(StoreCourseBasicRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {

            $course = Course::create([
                'course_code' => $request->course_code,
                'course_name' => $request->course_name,
                'fee_modes_id' => $request->fee_modes_id ?? 1,
                'course_fees' => $request->course_fees ?? 0,
                'fees_valid_up_to' => $request->fees_valid_up_to,
                'upcoming_fees' => $request->upcoming_fees,
            ]);
            return ResponseHelper::success(
                "Course created successfully",
                new CourseResource($course),
                201
            );
        }, [
            'action' => 'create_course',
            'course_code' => $request->course_code
        ]);
    }


    public function update(UpdateCourseRequest $request, $courseId)
    {
        return $this->executeInTransaction(function () use ($request, $courseId) {
            $course = Course::findOrFail($courseId);

            $updateData = [];
            if ($request->has('course_code')) $updateData['course_code'] = $request->course_code;
            if ($request->has('course_name')) $updateData['course_name'] = $request->course_name;
            if ($request->has('fee_modes_id')) $updateData['fee_modes_id'] = $request->fee_modes_id;
            if ($request->has('course_fees')) $updateData['course_fees'] = $request->course_fees;
            if ($request->has('fees_valid_up_to')) $updateData['fees_valid_up_to'] = $request->fees_valid_up_to;
            if ($request->has('upcoming_fees')) $updateData['upcoming_fees'] = $request->upcoming_fees;

            $course->update($updateData);

            if ($request->has('topics') && is_array($request->topics)) {
                $course->details()->delete();
                $course->details()->createMany($request->topics);
            }

            $course->load('details');

            return ResponseHelper::success(
                "Course updated successfully",
                new CourseResource($course)
            );
        }, [
            'action' => 'update_course',
            'course_id' => $courseId
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($courseId)
    {
        return $this->executeInTransaction(function () use ($courseId) {
            $course = Course::findOrFail($courseId);

            if ($course->admissions()->count() > 0) {
                return ResponseHelper::error("Cannot delete course: Students are currently enrolled in this course.", 422);
            }

            $course->details()->delete();
            $course->delete();

            return ResponseHelper::success("Course deleted successfully");
        });
    }

    public function students(Course $course)
    {
        $result =  $course->load('students');
        return new CourseWithStudentsResource($result);
    }
}
