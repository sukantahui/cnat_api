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



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::get('test', 'test');
});




// token is required
Route::group(['middleware' => 'auth:sanctum'], function () {
    //under Auth Controller
    Route::controller(AuthController::class)->group(function () {
        Route::get('me', 'getCurrentUser');
        Route::get('me2', 'getCurrentUser2');
        Route::post('logout', 'logout');
        Route::get('revokeAll', 'revoke_all');
    });


    //department
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('departments', 'index');
        Route::post('departments', 'store');
        Route::put('departments', 'update');
    });

    // for employees

    Route::controller(EmployeeController::class)->prefix('employees')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/{employeeId}', 'update');
        Route::delete('/{employeeId}', 'destroy');
    });

    Route::controller(GuestController::class)->prefix('guests')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/', 'edit');
        Route::put('/{guest}','update');
        Route::delete('/{guest}', 'destroy');
    });

    Route::controller(StudentController::class)->prefix('students')->group(function () {
        Route::post('/basic', 'storeBasic'); //custom
        Route::get('/{student}/admissions', 'admissions');//custom
        Route::get('/without-admission', 'studentsWithoutAdmission');//custom
    });
    Route::apiResource('students', StudentController::class);

    // Route::get('/students/{student}/admissions', [StudentController::class, 'admissions']);

    //for custom route for admission with student creation
    Route::controller(AdmissionController::class)->prefix('admissions')->group(function () {
        Route::post('/admissionWithStudent', 'storeStudentWithAdmission');
    });
    Route::apiResource('admissions', AdmissionController::class);

    Route::controller(VisitorController::class)->prefix('visitors')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store')->middleware('throttle:3,1');
        Route::put('/{visitorId}', 'update');
        Route::delete('/{visitorId}', 'destroy');
    });

    Route::apiResource('questions', QuestionController::class);

    Route::controller(OptionController::class)->prefix('options')->group(function () {
        Route::get('/', 'index');
        Route::get('/{optionId}', 'show');
        Route::post('/', 'store');
        Route::put('/{option}', 'update');
        Route::delete('/{option}', 'destroy');
    });
    //
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
    /*
    |--------------------------------------------------------------------------
    | Topic API Routes
    |--------------------------------------------------------------------------
    |
    | Route::apiResource() automatically creates the following RESTful API routes:
    |
    | GET       /topics             -> index()    // Get all topics
    | POST      /topics             -> store()    // Create a new topic
    | GET       /topics/{topic}     -> show()     // Get a single topic
    | PUT       /topics/{topic}     -> update()   // Update a topic
    | PATCH     /topics/{topic}     -> update()   // Partially update a topic
    | DELETE    /topics/{topic}     -> destroy()  // Delete a topic
    |
    | Note:
    | - Does NOT generate create() and edit() routes.
    | - Intended for REST APIs that return JSON responses.
    |
    */


    
    Route::controller(StateController::class)->prefix('states')->group(function () {
        Route::get('/', 'index');
        Route::get('/{stateId}', 'show');
        Route::post('/', 'store');
        Route::put('/{stateId}', 'update');
        Route::delete('/{stateId}', 'destroy');
    });
    Route::controller(CourseController::class)->prefix('courses')->group(function () {
        Route::get('/', 'index');
        Route::get('/details', 'courseWithDetails');
        Route::post('/', 'store');
        Route::post('/basic', 'storeBasic');
        Route::put('/{courseId}', 'update');
        Route::delete('/{courseId}', 'destroy');
        Route::get('/{course}/students', 'students');
    });

    // Route::controller(ResultController::class)->prefix('results')->group(function () {
    //     Route::get('/', 'index');
    //     Route::post('/', 'store');
    //     Route::put('/{result}', 'update');
    //     Route::delete('/{result}', 'destroy');
    // });
    Route::apiResource('results', ResultController::class);

    // Route::controller(SimpleFeesReceiptController::class)->prefix('fees-receipts')->group(function () {
    //     Route::get('/', 'index');
    //     Route::post('/', 'store');
    //     Route::get('/{simpleFeesReceipt}', 'show');
    //     Route::put('/{simpleFeesReceipt}', 'update');
    //     Route::delete('/{simpleFeesReceipt}', 'destroy');
    // });
    Route::apiResource('fees-receipts', SimpleFeesReceiptController::class);


});


//*****************************************************************************************************
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
