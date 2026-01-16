<?php


use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\VisitorController;

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
        // Route::put('/{guestId}','update');
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

    Route::controller(VisitorController::class)->prefix('visitors')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store')->middleware('throttle:3,1');
        Route::put('/{visitorId}', 'update');
        Route::delete('/{visitorId}', 'destroy');
    });

    Route::controller(QuestionController::class)->prefix('questions')->group(function () {
        Route::get('/', 'index');
        Route::get('/{questionId}', 'show');
        Route::post('/', 'store');
        Route::put('/{questionId}', 'update');
        Route::delete('/{questionId}', 'destroy');
    });
    Route::controller(OptionController::class)->prefix('options')->group(function () {
        Route::get('/', 'index');
        Route::get('/{optionId}', 'show');
        Route::post('/', 'store');
        Route::put('/{optionId}', 'update');
        Route::delete('/{optionId}', 'destroy');
    });
    Route::controller(StateController::class)->prefix('states')->group(function () {
        Route::get('/', 'index');
        Route::get('/{stateId}', 'show');
        Route::post('/', 'store');
        Route::put('/{stateId}', 'update');
        Route::delete('/{stateId}', 'destroy');
    });
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
    Route::controller(CourseController::class)->prefix('courses')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{courseId}', 'update');
        Route::delete('/{courseId}', 'destroy');
    });
    Route::controller(AdmissionController::class)->prefix('admissions')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{admissionId}', 'update');
        Route::delete('/{admissionId}', 'destroy');
    });
    

    Route::controller(VisitorController::class)->prefix('visitors')->group(function () {
        Route::post('/', 'store')->middleware('throttle:3,1');
    });



});
