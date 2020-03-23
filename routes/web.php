<?php

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

Route::get('/','PagesRoutesController@welcome')->name('welcome');
Route::get('aboutUs','PagesRoutesController@aboutUs')->name('aboutUs');
Route::get('shop','PagesRoutesController@shop')->name('shop');
Route::get('singleProduct/{id}','PagesRoutesController@singleProduct')->name('singleProduct');
Route::get('services','PagesRoutesController@services')->name('services');
Route::resource('schedule','ScheduleController');

//Blog Routes

Route::get('blogGrid','BlogController@gridView')->name('blogGrid');
Route::get('blogList','BlogController@listView')->name('blogList');
Route::get('blogDetails/{slug}','BlogController@detailsView')->name('blogDetails');
Route::get('blogByCategory/{id}','BlogController@postByCategory')->name('blogByCategory');


Route::post('addCart','CartController@addCart')->name('addCart');
Route::get('cart','CartController@cart')->name('cart');
Route::post('cartUpdate}','CartController@cartUpdate')->name('cartUpdate');
Route::get('cartRemove','CartController@cartRemove')->name('cartRemove');
Route::get('clearCart','CartController@clearCart')->name('clearCart');


Route::get('checkOut','CheckOutController@index')->name('checkOut');


Route::get('cRegistrationPage','CustomerController@cRegistrationPage')->name('cRegistrationPage');
Route::post('cRegistraion','CustomerController@cRegistraion')->name('cRegistraion');
Route::post('authenticate','CustomerController@authenticate')->name('authenticate');
Route::get('cLogin','CustomerController@cLogin')->name('cLogin');
Route::get('cLogout','CustomerController@cLogout')->name('cLogout');

Route::post('paypal','PaymentController@payWithpaypal')->name('payWithpaypal');
Route::post('cash','PaymentController@payWithCash')->name('payWithCash');
Route::get('status','PaymentController@getPaymentStatus')->name('getPaymentStatus');

Route::post('shipment','ShipmentController@store')->name('shipment');

Route::get('paymentPage','PaymentController@index')->name('paymentPage');
Route::get('paymentSuccess','PaymentController@paymentSuccess')->name('paymentSuccess');

Route::get('paymentPageCopy',function (){
    return view('BackendPages.Orders.index');
})->name('paymentPageCopy');



Auth::routes();
Auth::routes(['register' => false]);


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin'],function(){
    Route::get('/home', 'HomeController@index')->name('home');



    Route::get('order', 'OrderController@index')->name('order');
    Route::get('orderEdit/{id}', 'OrderController@orderEdit')->name('orderEdit');
    Route::post('changeDeliveryStat/{id}', 'OrderController@changeDeliveryStat')->name('changeDeliveryStat');
    Route::post('changePaymentStat/{id}', 'OrderController@changePaymentStat')->name('changePaymentStat');
    Route::post('deleteOrder/{id}', 'OrderController@deleteOrder')->name('deleteOrder');



    Route::resource('video','VideoController');
    Route::resource('audio','AudioController');
    Route::resource('product','ProductController');
    Route::resource('post','PostController');
    Route::resource('category','CategoryController');

    Route::get('schedule','ScheduleController@index')->name('adminSchedule');
    Route::get('markAsDone/{id}','ScheduleController@markAsDone')->name('markAsDone');
    Route::get('markAsUnDone/{id}','ScheduleController@markAsUnDone')->name('markAsUnDone');
    Route::post('deleteSchedule/{id}','ScheduleController@deleteSchedule')->name('deleteSchedule');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();});
