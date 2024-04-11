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

Route::get('/', [App\http\Controllers\CoursController::class,'index']);
Route::get('/search', [App\http\Controllers\CoursController::class,'search']);
Route::get('/Courses-by-category/{id}', [App\http\Controllers\CoursController::class,'Courese_by_category']);
Route::get('/Course/{id}',[App\http\Controllers\CoursController::class,'return_Course_info']);
Route::get('/Course/user-Enroll-in-course/{id}',[App\http\Controllers\CoursController::class,'user_Enroll_in_Course']);
Route::get('/Course/trainer-Enroll-in-course/{id}',[App\http\Controllers\CoursController::class,'trainer_Enroll_in_Course']);
Route::get('/Delete/{id}',[App\http\Controllers\CoursController::class,'delete_Course']);
Route::get('/Courses',[App\http\Controllers\CoursController::class,'return_course_data_ToAdmin_page']);
Route::get('/DashBoard/CreateCourse', [App\http\Controllers\CoursController::class,'return_create_Course']);
Route::post('/DashBoard/CreateCourse/Create_C', [App\http\Controllers\CoursController::class,'create_Course']);
Route::get('/DashBoard/Courses/delete/{id}',[App\http\Controllers\CoursController::class,'delete_Course_DashBoard']);
Route::get('/DashBoard/update/{id}/update-cours',[App\http\Controllers\CoursController::class,'update']);
Route::get('/DashBoard/update/{id}',[App\http\Controllers\CoursController::class,'return_update_course']);
Route::get('/DashBoard/user-profile/trainer-courses/{id}',[App\http\Controllers\CoursController::class,'Trainer_courses']);

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
Route::get('/DashBoard/Enrollment', [App\http\Controllers\UserController::class,'Return_Enrollment']);
Route::get('/DashBoard/Enrollment/user-Quit-Course/{Course_id}/{User_id}',[App\Http\Controllers\UserController::class,'Quit_course']);
route::get('/DashBoard/user-profile/{id}',[App\Http\Controllers\UserController::class,'user_deatails']);
/**
 *  for trainer controller
 */
Route::get('/Change-state',[App\http\Controllers\trainerController::class,'Return_ChangeState']);
Route::post('/Change-state/becomoeTrariner', [App\http\Controllers\trainerController::class,'user_to_trainer']);
Route::get('/DashBoard/change-name/{id}', [App\http\Controllers\trainerController::class,'Change_name']);
Route::get('/Trainers', [App\http\Controllers\trainerController::class,'return_trainer_data_ToAdmin_page']);
Route::get('/Trainers/delete-tariner/{id}', [App\http\Controllers\trainerController::class,'delete']);
Route::get('/DashBoard/Courses', [App\http\Controllers\trainerController::class,'retirn_courses_Dashboard']);
Route::get('/DashBoard/Enrollment/trainer-Quit-Course/{Course_id}/{Trainer_id}',[App\Http\Controllers\trainerController::class,'Quit_course']);

/**
 *  for Categorie Controllers
 */
Route::get('/Categories',[App\http\Controllers\CategoryController::class,'index']);
Route::get('/Categories/Create',[App\http\Controllers\CategoryController::class,'Return_create']);
Route::post('/Categories/Create-category',[App\http\Controllers\CategoryController::class,'create']);
Route::get('/Categories/delete/{id}',[App\http\Controllers\CategoryController::class,'delete']);



/**
 *  for testing purposes
 */

Route::get('/test2', [App\http\Controllers\trainerController::class,'test']);



