<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/**
 * for Cours controller  
 */

Route::get('/', [App\http\Controllers\CoursController::class,'load_index']);
Route::get('/Course/{id}',[App\http\Controllers\CoursController::class,'return_Course_info']);
Route::get('/Delete/{id}',[App\http\Controllers\CoursController::class,'delete_Course']);
Route::get('/Courses',[App\http\Controllers\CoursController::class,'return_course_data_ToAdmin_page']);
Route::get('/DashBoard/CreateCourse', [App\http\Controllers\CoursController::class,'return_create_Course']);
Route::post('/DashBoard/CreateCourse/Create_C', [App\http\Controllers\CoursController::class,'create_Course']);

/**
 *  for user controller
 */

Route::get('/Users',[App\http\Controllers\UserController::class,'return_user_data_ToAdmin_page']);
Route::get('/join', [App\http\Controllers\UserController::class,'Return_signup_page']);
Route::post('/join/signup', [App\http\Controllers\UserController::class,'create_user']);
Route::get('/login', [App\http\Controllers\UserController::class,'Return_login_page']);
Route::get('/signin/login', [App\http\Controllers\UserController::class,'login']);
Route::get('/logout', [App\http\Controllers\UserController::class,'logout']);
Route::get('/Users/delete-user/{id}', [App\http\Controllers\UserController::class,'delete']);
Route::get('/DashBoard', [App\http\Controllers\UserController::class,'Return_DashBoard']);

/**
 *  for trainer controller
 */

Route::get('/Change-state',[App\http\Controllers\trainerController::class,'Return_ChangeState']);
Route::post('/Change-state/becomoeTrariner', [App\http\Controllers\trainerController::class,'user_to_trainer']);
Route::get('/DashBoard/Upadate/{id}', [App\http\Controllers\trainerController::class,'Update']);
Route::get('/Trainers', [App\http\Controllers\trainerController::class,'return_trainer_data_ToAdmin_page']);
Route::get('/Trainers/delete-tariner/{id}', [App\http\Controllers\trainerController::class,'delete']);
Route::get('/DashBoard/Courses', [App\http\Controllers\trainerController::class,'retirn_courses_Dashboard']);


/**
 *  for testing purposes
 */

Route::get('/test2', [App\http\Controllers\trainerController::class,'test']);



