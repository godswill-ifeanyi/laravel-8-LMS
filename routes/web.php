<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('category/{category_slug}/{course_slug}', [App\Http\Controllers\FrontController::class, 'show']);

Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');

Route::post('/add-to-cart', [App\Http\Controllers\Front\CartController::class, 'add_course']);
Route::get('/cart', [App\Http\Controllers\Front\CartController::class, 'view_cart']);

Route::prefix('/admin')->middleware('auth','isAdmin')->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // CATEGORY
    Route::get('/categories',  [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/add-category',  [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/add-category',  [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/edit-category/{category_id}',  [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('/edit-category/{category_id}',  [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::delete('/delete-category',  [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    
    // COURSES
    Route::get('/courses',  [App\Http\Controllers\Admin\CourseController::class, 'index']);
    Route::get('/my-courses',  [App\Http\Controllers\Admin\CourseController::class, 'my_index']);
    Route::get('/add-course',  [App\Http\Controllers\Admin\CourseController::class, 'create']);
    Route::post('/add-course',  [App\Http\Controllers\Admin\CourseController::class, 'store']);
    Route::get('/view-course/{course_id}',  [App\Http\Controllers\Admin\CourseController::class, 'show']);
    Route::post('/add-course-details/{course_id}',  [App\Http\Controllers\Admin\CourseController::class, 'add_details']);
    Route::get('/course-details/{course_id}',  [App\Http\Controllers\Admin\CourseController::class, 'show_details']);
    Route::get('/add-course-details/{course_id}',  [App\Http\Controllers\Admin\CourseController::class, 'show_add_details']);
    Route::get('/edit-course/{course_id}',  [App\Http\Controllers\Admin\CourseController::class, 'edit']);
    Route::post('/edit-course/{course_id}',  [App\Http\Controllers\Admin\CourseController::class, 'update']);
    Route::delete('/delete-course',  [App\Http\Controllers\Admin\CourseController::class, 'destroy']);

    // SETTING
    Route::get('/settings',  [App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('/settings',  [App\Http\Controllers\Admin\SettingController::class, 'store']);

    // INSTRUCTOR
    Route::get('/instructors',  [App\Http\Controllers\Admin\InstructorController::class, 'index']);
    Route::get('/lock-instructor/{instructor_id}',  [App\Http\Controllers\Admin\InstructorController::class, 'lock']);
    Route::get('/activate-instructor/{instructor_id}',  [App\Http\Controllers\Admin\InstructorController::class, 'activate']);
    Route::delete('/delete-instructor',  [App\Http\Controllers\Admin\InstructorController::class, 'destroy']);

    // STUDENT
    Route::get('/students',  [App\Http\Controllers\Admin\StudentController::class, 'index']);
    Route::get('/lock-student/{student_id}',  [App\Http\Controllers\Admin\StudentController::class, 'lock']);
    Route::get('/activate-student/{student_id}',  [App\Http\Controllers\Admin\StudentController::class, 'activate']);
    Route::delete('/delete-student',  [App\Http\Controllers\Admin\StudentController::class, 'destroy']);
});

Route::prefix('/instructor')->middleware('auth','isInstructor')->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\Instructor\DashboardController::class, 'index']);

        // COURSES
        Route::get('/courses',  [App\Http\Controllers\Instructor\CourseController::class, 'index']);
        Route::get('/add-course',  [App\Http\Controllers\Instructor\CourseController::class, 'create']);
        Route::post('/add-course',  [App\Http\Controllers\Instructor\CourseController::class, 'store']);
        Route::get('/view-course/{course_id}',  [App\Http\Controllers\Instructor\CourseController::class, 'show']);
        Route::get('/edit-course/{course_id}',  [App\Http\Controllers\Instructor\CourseController::class, 'edit']);
        Route::post('/edit-course/{course_id}',  [App\Http\Controllers\Instructor\CourseController::class, 'update']);
        Route::delete('/delete-course',  [App\Http\Controllers\Instructor\CourseController::class, 'destroy']);

});

/* Route::prefix('/student')->middleware('auth','isStudent')->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index']);

}); */

Route::get('student/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index']);