<?php


use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::get('test', 'test');
});




// token is required
Route::group(['middleware' => 'auth:sanctum'], function(){
    //under Auth Controller
    Route::controller(AuthController::class)->group(function(){
        Route::get('me', 'getCurrentUser');
        Route::post('logout', 'logout');
        Route::get('revokeAll', 'revoke_all');

    });

   
    //department
    Route::controller(DepartmentController::class)->group(function(){
        Route::get('departments','index');
        Route::post('departments','store');
        Route::put('departments','update');
    });
    
    // for employees
    
    Route::controller(EmployeeController::class)->prefix('employees')->group(function(){
        Route::get('/','index');
        Route::get('/{id}','show');
        Route::post('/','store');
        Route::put('/{employeeId}','update');
        Route::delete('/{employeeId}','destroy');
    });

     Route::controller(GuestController::class)->prefix('guests')->group(function(){
        Route::get('/','index');
        Route::get('/{id}','show');
        Route::post('/','store');
        Route::put('/','edit');
        // Route::put('/{guestId}','update');
        Route::delete('/{guestId}','destroy');
    });
});



// for development purpose no token required
Route::group(array('prefix' => 'dev'), function() {
    Route::controller(GuestController::class)->prefix('guests')->group(function(){
        Route::get('/','index');
        Route::get('/{id}','show');
        Route::post('/','store');
        // Route::put('/{guestId}','update');
        Route::put('/{guestId}','edit');
        Route::delete('/{guestId}','destroy');
    });
});
