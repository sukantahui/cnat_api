<?php


use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\SimpleFeesReceiptController;
use App\Http\Controllers\CycleCalendarController;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
});




// token is required
Route::group(['middleware' => 'auth:sanctum'], function () {

    // -------------------------------------------------------------------------
    // Any Authenticated User (Self-service & Personal)
    // -------------------------------------------------------------------------
    Route::controller(AuthController::class)->group(function () {
        Route::get('me', 'getCurrentUser');
        Route::get('me2', 'getCurrentUser2');
        Route::post('logout', 'logout');
        Route::get('revokeAll', 'revoke_all');
    });

    // Menstrual Cycle Calendar
    Route::prefix('cycle')->controller(CycleCalendarController::class)->group(function () {
        Route::get('me',               'me');
        Route::put('me',               'updateProfile');
        Route::post('period',          'addPeriodDate');
        Route::put('period/{date}',    'editPeriodDate');
        Route::delete('period/{date}', 'deletePeriodDate');
        Route::post('periods/sync',    'syncPeriodDates');
        Route::delete('periods',       'clearAllPeriods');
    });

    // -------------------------------------------------------------------------
    // Tier 1: Administration & System (Admin, Developer, Owner)
    // -------------------------------------------------------------------------
    Route::middleware('role:Admin,Developer,Owner')->group(function () {
        // User & Role Management (Admin Only)
        Route::controller(AuthController::class)->prefix('users')->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'register');
        });

        // User roles lookup
        Route::get('user-types', [App\Http\Controllers\UserTypeController::class, 'index']);

        // Department
        Route::controller(DepartmentController::class)->group(function () {
            Route::get('departments', 'index');
            Route::post('departments', 'store');
            Route::put('departments', 'update');
        });

        // Employees
        Route::controller(EmployeeController::class)->prefix('employees')->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'show');
            Route::post('/', 'store');
            Route::put('/{employeeId}', 'update');
            Route::delete('/{employeeId}', 'destroy');
        });
    });

    // -------------------------------------------------------------------------
    // Tier 1.5: Academic & Admissions Management (Admin, Developer, Owner, Manager)
    // -------------------------------------------------------------------------
    Route::middleware('role:Admin,Developer,Owner,Manager')->group(function () {
        // Register Student With Course Admission & Set Course Fees
        Route::controller(AdmissionController::class)->prefix('admissions')->group(function () {
            Route::post('/admissionWithStudent', 'storeStudentWithAdmission');
        });
    });

    // -------------------------------------------------------------------------
    // Tier 2: Academic Staff (Admin, Developer, Owner, Manager, Teacher)
    // -------------------------------------------------------------------------
    Route::middleware('role:Admin,Developer,Owner,Manager,Teacher')->group(function () {
        // Fee Modes
        Route::get('fee-modes', [App\Http\Controllers\FeeModeController::class, 'index']);

        // Students
        Route::controller(StudentController::class)->prefix('students')->group(function () {
            Route::post('/basic', 'storeBasic');
            Route::get('/{student}/admissions', 'admissions');
            Route::get('/without-admission', 'studentsWithoutAdmission');
        });
        Route::apiResource('students', StudentController::class);

        // Admissions resource
        Route::get('admissions/{admissionId}/ledger', [AdmissionController::class, 'ledger']);
        Route::apiResource('admissions', AdmissionController::class);

        // Courses
        Route::controller(CourseController::class)->prefix('courses')->group(function () {
            Route::get('/', 'index');
            Route::get('/details', 'courseWithDetails');
            Route::post('/', 'store');
            Route::post('/basic', 'storeBasic');
            Route::put('/{courseId}', 'update');
            Route::delete('/{courseId}', 'destroy');
            Route::get('/{course}/students', 'students');
        });

        // Curriculum hierarchy
        Route::controller(SubjectController::class)->prefix('subjects')->group(function () {
            Route::get('/unused', 'unused_subjects');
            Route::get('/{subject}/chapters', 'list_of_chapters_in_subjects');
        });
        Route::apiResource('subjects', SubjectController::class);

        Route::controller(ChapterController::class)->prefix('chapters')->group(function () {
            Route::get('/unusedChapters', 'unused_chapters');
            Route::get('/{chapter}/topics', 'list_of_topics_in_chapters');
        });
        Route::apiResource('chapters', ChapterController::class);

        Route::prefix('topics')->controller(TopicController::class)->group(function () {
            Route::get('/unusedTopics', 'unused_topics');
            Route::get('/{topic}/questions', 'list_of_questions_in_topics');
        });
        Route::apiResource('topics', TopicController::class);

        // Question Bank & Exams
        Route::apiResource('questions', QuestionController::class);

        Route::controller(OptionController::class)->prefix('options')->group(function () {
            Route::get('/', 'index');
            Route::get('/{optionId}', 'show');
            Route::post('/', 'store');
            Route::put('/{option}', 'update');
            Route::delete('/{option}', 'destroy');
        });

        Route::apiResource('results', ResultController::class);
        Route::apiResource('fees-receipts', SimpleFeesReceiptController::class);

        // States
        Route::controller(StateController::class)->prefix('states')->group(function () {
            Route::get('/', 'index');
            Route::get('/{stateId}', 'show');
            Route::post('/', 'store');
            Route::put('/{stateId}', 'update');
            Route::delete('/{stateId}', 'destroy');
        });
    });

    // -------------------------------------------------------------------------
    // Tier 3: Event & Inquiries (Admin, Developer, Owner, Manager, Teacher, Manager Sale)
    // -------------------------------------------------------------------------
    Route::middleware('role:Admin,Developer,Owner,Manager,Teacher,Manager Sale')->group(function () {
        Route::controller(GuestController::class)->prefix('guests')->group(function () {
            Route::get('/', 'index');
            Route::get('/pagination', 'index_pagination');
            Route::get('/{guest}', 'show');
            Route::get('/search/any', 'search');
            Route::post('/', 'store');
            Route::put('/{guest}','update');
            Route::delete('/{guest}', 'destroy');
        });

        Route::controller(VisitorController::class)->prefix('visitors')->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store')->middleware('throttle:3,1');
            Route::put('/{visitorId}', 'update');
            Route::delete('/{visitorId}', 'destroy');
        });
    });

});
// 
//  */
// for development purpose no token required
Route::group(array('prefix' => 'dev'), function () {
    Route::controller(GuestController::class)->prefix('guests')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        // Route::put('/{guestId}','update');
        Route::put('/{guestId}', 'edit');
        Route::delete('/{guestId}', 'destroy');
    });
    Route::controller(StudentController::class)->prefix('students')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{studentId}', 'update');
        Route::delete('/{studentId}', 'destroy');
    });

    Route::controller(AdmissionController::class)->prefix('admissions')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{admissionId}', 'update');
        Route::delete('/{admissionId}', 'destroy');
    });
    Route::controller(CertificateController::class)->prefix('certificates')->group(function () {
        Route::get('/{certificate_number}', 'index');
    });



    Route::controller(VisitorController::class)->prefix('visitors')->group(function () {
        Route::post('/', 'store')->middleware('throttle:3,1');
    });
});




