<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\ProductController;
use App\Http\Controllers\Apps\SliderController;
use App\Http\Controllers\Apps\CategoryController;
use App\Http\Controllers\Apps\TagController;

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Website
use App\Http\Controllers\Website\PagesController;

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

// Route::get('/', function () {
//     return view('pages/index');
// });

// Route::get('/home', [PagesController::class,'index'])->name('home');
// Route::get('/', [PagesController::class,'index']);

Route::controller(PagesController::class)->name('website.')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/address', 'address');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });


    Route::resource('/slider', SliderController::class);
    Route::get('slider-change-status', [SliderController::class,'change_status'])->name('slider.change.status');


    Route::resource('/products', ProductController::class);
    Route::get('product-change-status', [ProductController::class,'change_status'])->name('product.change.status');



    Route::resource('/category', CategoryController::class);
    Route::get('category-change-status', [CategoryController::class,'change_status'])->name('category.change.status');



    Route::resource('/tags', TagController::class);
    Route::get('tag-change-status', [TagController::class,'change_status'])->name('tag.change.status');


    Route::resource('vendor/product', ProductController::class);



});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
