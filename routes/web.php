<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
|
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


// FOR USER  
/* nomads.com/parameter */
Route::prefix('/')
    ->namespace('App\Http\Controllers')
    ->middleware([])
    ->group(function(){
        Route::get( '/',                             'HomeController@index')       ->name('home');
        Route::get( '/detail/{slug}',                'DetailController@index')     ->name('detail');
        Route::get( '/checkout/{id}',                'CheckoutController@index')   ->middleware(['auth','verified'])->name('checkout');
        Route::post('/checkout/{id}',                'CheckoutController@process') ->middleware(['auth','verified'])->name('checkout-process');
        Route::post('/checkout/create/{detail_id}',  'CheckoutController@create')  ->middleware(['auth','verified'])->name('checkout-create');
        Route::get( '/checkout/remove/{detail_id}',  'CheckoutController@remove')  ->middleware(['auth','verified'])->name('checkout-remove');
        Route::get( '/checkout/confirm/{id}',        'CheckoutController@success') ->middleware(['auth','verified'])->name('checkout-success');
    });


// FOR ADMIN
/* nomads.com/admin/parameter */
Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/','DashboardController@index')->name('dashboard');
        Route::resource('travel-package', 'TravelPackageController');
        Route::resource('gallery', 'galleryController');
        Route::resource('transaction', 'TransactionController');
    });

Auth::routes(['verify' => true]);
