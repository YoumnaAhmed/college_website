<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[LoginController::class ,'index'])->name('login');
Route::post('/login',[LoginController::class ,'store'])->name('store');





Route::group(['middleware'=>['auth','disable_back']],function() {

    Route::group(['middleware' => 'is_admin', 'prefix' => 'admin/', 'as' => 'admin.'], function () {
        Route::get('/register',[RegisterController::class ,'index'])->name('register');
        Route::post('/register',[RegisterController::class ,'store'])->name('new_student');
        Route::get('/liststud',[RegisterController::class ,'list'])->name('liststud');
        Route::get('/archive',[RegisterController::class ,'archive'])->name('archive');
        Route::get('/deletestud/{id}',[RegisterController::class ,'delete'])->name('delete');
        Route::get('/restore/{id}',[RegisterController::class ,'restore'])->name('restore');
        Route::get('/forcedelete/{id}',[RegisterController::class ,'forcedelete'])->name('force_delete');
        Route::post('/gpaedit/{subj_id}/{stud_id}',[AdminController::class ,'edit'])->name('edit');
        Route::get('/gpaedit/{id}',[RegisterController::class ,'update'])->name('update');
        Route::post('/gpaedit/{stud_id}',[RegisterController::class ,'calculateGPA'])->name('gpa');
        Route::get('/listsubj',[SubjectController::class ,'list'])->name('listsubj');
        Route::get('/deletesubj/{id}',[SubjectController::class ,'delete'])->name('deletesubj');
        Route::get('/addsubj',[SubjectController::class ,'index'])->name('addsubj_view');
        Route::post('/addsubj',[SubjectController::class ,'store'])->name('addsubj');
        Route::post('/home/',[LoginController::class ,'home'])->name('home');
        Route::post('/logout/',[LoginController::class ,'logout'])->name('logout');
        Route::get('/changePass',[LoginController::class ,'changePass'])->name('changePass_index');
        Route::post('/changePassword',[LoginController::class ,'changePassword'])->name('changePassword');
        Route::get('/adminProfile/',[LoginController::class ,'viewProfile'])->name('profile');
        




    });
    Route::group(['middleware' => 'is_student','prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/enroll',[EnrollController::class ,'index'])->name('enroll');
        Route::post('/enroll',[EnrollController::class ,'store'])->name('enroll');
        Route::get('/changePass',[LoginController::class ,'changePass'])->name('changePass_index');
        Route::post('/changePassword',[LoginController::class ,'changePassword'])->name('changePassword');
        Route::get('/listsubj/',[SubjectController::class ,'student_list'])->name('listsubj');
        Route::post('/listsubj/{subjectid}/',[EnrollController::class ,'store'])->name('enroll');
        Route::post('/courses/',[SubjectController::class ,'enrolled_courses'])->name('courses');
        Route::post('/completed_courses/',[SubjectController::class ,'completed_courses'])->name('completed');
        Route::post('/fees/',[AdminController::class ,'calculate_fees'])->name('fees');
        Route::post('/home/',[LoginController::class ,'home'])->name('home');
        Route::post('/logout/',[LoginController::class ,'logout'])->name('logout');
        Route::get('/userProfile/',[LoginController::class ,'viewProfile'])->name('profile');
    });

        
});




