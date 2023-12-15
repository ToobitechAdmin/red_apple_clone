<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\ProductController;
use App\Http\Controllers\Apps\SliderController;
use App\Http\Controllers\Apps\CategoryController;
use App\Http\Controllers\Apps\TagController;
use App\Http\Controllers\Apps\CityController;
use App\Http\Controllers\Apps\AreaController;
use App\Http\Controllers\Apps\StateController;

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Website
use App\Http\Controllers\Website\PagesController;
use App\Http\Controllers\Website\CartController;

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
// Route::get('/location', [PagesController::class,'location'])->name('website.location');

    // Your routes go here
    Route::controller(PagesController::class)->name('website.')->group(function () {
        Route::get('/', 'index')->name('home');
        // Route::get('/location', 'location')->name('location');
        Route::get('/home', 'index')->name('home');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/return_policy', 'returnPolicy')->name('return.policy');
        Route::get('/policy_privacy', 'policyPrivacy')->name('policy.privacy');
        Route::get('/term_condition', 'termCondition')->name('term.condition');
        Route::get('/contact_us', 'contactUs')->name('contact_us');
        Route::get('/location', 'location')->name('location');
        Route::get('/data-save','saveData')->name('data.save');
    });
    Route::controller(CartController::class)->name('website.')->group(function () {
        Route::post('add-to-cart/', 'addToCart')->name('add.to.cart');
        Route::get('cart/', 'cart')->name('cart');
        Route::post('update-cart/', 'updateCart')->name('update.cart');
        Route::post('delete-cart/', 'delCart')->name('delete.cart');

    });
    Route::get('/product/list',[ProductController::class,'productList'])->name('product.list');

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

    Route::resource('/city', CityController::class);
   // Route::get('city-change-status', [TagController::class,'change_status'])->name('city.change.status');

    Route::resource('/state', StateController::class);
   // Route::get('state-change-status', [TagController::class,'change_status'])->name('state.change.status');

    Route::resource('/area', AreaController::class);
   // Route::get('address-change-status', [TagController::class,'change_status'])->name('address.change.status');

    Route::resource('vendor/product', ProductController::class);



});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
