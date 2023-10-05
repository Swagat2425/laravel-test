<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\Front\PostController::class, 'home'])->name('home');
Route::get('/signup', [Controllers\Front\FrontendController::class, 'signup'])->name('signup');
Route::post('/signup', [Controllers\Front\FrontendController::class, 'post_signup'])->name('post_signup');
Route::get('/login', [Controllers\Front\FrontendController::class, 'login'])->name('login');
Route::post('/login', [Controllers\Front\FrontendController::class, 'post_login'])->name('post_login');
Route::group(['prefix'=>'/blog'], function() {
    Route::get('/{slug}', [Controllers\Front\PostController::class, 'get_cat_blogs']);
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {

    Route::get('/', [Controllers\Front\FrontendController::class, 'dashboard']);
    Route::group(['prefix'=>'/blog'], function() {
        Route::get('/', [Controllers\Front\PostController::class, 'new_blog']);
        Route::get('/create', [Controllers\Front\PostController::class, 'new_blog'])->name('blog.create');
        Route::post('/create', [Controllers\Front\PostController::class, 'post_create_new_blog'])->name('post_blog.create');
    });
    Route::post('/get_cats', [Controllers\Front\PostController::class, 'get_cats'])->name('get_cats');
    Route::get('/logout', [Controllers\Front\FrontendController::class, 'logout'])->name('logout');
    Route::post('/logout', [Controllers\Front\FrontendController::class, 'logout']);

});

Route::get('admin/login', [Controllers\Admin\AuthController::class, 'login'])->name('admin_login');
Route::post('admin/login', [Controllers\Admin\AuthController::class, 'post_login'])->name('admin.login');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [Controllers\Admin\AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/dashboard', [Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/blogs', [Controllers\Admin\PostController::class, 'blogs'])->name('admin.blogs');
    Route::post('/get-blogs', [Controllers\Admin\PostController::class, 'get_blogs'])->name('admin.get.blogs');
    Route::get('/customers', [Controllers\Admin\CustomerController::class, 'customers'])->name('admin.customers');
    Route::post('/get-customers', [Controllers\Admin\CustomerController::class, 'get_customers'])->name('admin.get.customers');
    Route::get('/logout', [Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
});