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

use App\Http\Controllers\HomeController;

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/place/details/{id}', 'HomeController@placeDdetails')->name('place.details');
Route::get('/package/details/{id}', 'HomeController@packageDetails')->name('package.details');
Route::get('/place-list', 'HomeController@allPlace')->name('all.place');
Route::get('/package-list', 'HomeController@allPackage')->name('all.package');
Route::get('/district/{id}', 'HomeController@districtWisePlace')->name('district.wise.place');
Route::get('/placetype/{id}', 'HomeController@placetypeWisePlace')->name('placetype.wise.place');

Route::get('/package/booking/{id}', 'HomeController@packageBooking')->name('package.booking');
Route::get('/package/booking', 'HomeController@storeBookingRequest')->name('store.package.booking');


Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');



Route::group([ 
    'as' => 'admin.', 
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => [ 
        'auth', 'admin', 'verified'
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('profile-info','DashboardController@showProfile')->name('profile.show');
    Route::get('profile-info/edit/{id}','DashboardController@editProfile')->name('profile.edit');
    Route::post('profile-info/update','DashboardController@updateProfile')->name('profile.update');

    Route::resource('district', 'DistrictController');
    Route::resource('type', 'TypeController');
    Route::resource('place', 'PlaceController');
    Route::resource('about', 'AboutController');
    Route::resource('guide', 'GuideController');
    Route::resource('users', 'UsersController');
    Route::resource('package', 'PackageController');
    Route::get('list', 'UsersController@adminList')->name('list');


    Route::get('booking-request/list', 'BookingController@pendingBookingList')->name('pending.booking');
    Route::post('booking-request/approve/{id}', 'BookingController@bookingApprove')->name('booking.approve');
    Route::post('booking-request/remove/{id}', 'BookingController@bookingRemoveByAdmin')->name('booking.remove');
    Route::get('running/packages/', 'BookingController@runningPackage')->name('package.running');
    Route::post('running/package/complete/{id}', 'BookingController@runningPackageComplete')->name('package.running.complete');
    Route::get('tour-history/list', 'BookingController@tourHistory')->name('tour.history');
});

Route::group([ 
    'as' => 'user.', 
    'prefix' => 'user', 
    'namespace' => 'User', 
    'middleware' => [ 
    'auth', 'user', 'verified'
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('profile-info','DashboardController@showProfile')->name('profile.show');
    Route::get('profile-info/edit/{id}','DashboardController@editProfile')->name('profile.edit');
    Route::post('profile-info/update','DashboardController@updateProfile')->name('profile.update');

    
    Route::get('districts','DashboardController@getDistrict')->name('district');
    Route::get('placetypes','DashboardController@getPlaceType')->name('placetype');
    
    Route::get('places','DashboardController@getPlaces')->name('place');
    Route::get('places/{id}','DashboardController@getPlaceDetails')->name('place.show');

    Route::get('guides','DashboardController@getGuides')->name('guide');
    Route::get('guide/{id}','DashboardController@getGuideDetails')->name('guide.show');

    Route::get('packages','DashboardController@getPackage')->name('package');
    Route::get('packages/{id}','DashboardController@getPackageDetails')->name('package.show');


    Route::get('tour-history/list', 'BookingController@tourHistory')->name('tour.history');
    Route::get('booking-request/list', 'BookingController@pendingBookingList')->name('pending.booking');
    Route::post('booking-request/cancel/{id}', 'BookingController@canceLBookingRequest')->name('booking.cancel');
});



View::composer('layouts.frontend.inc.footer', function($view){
    $placetypes = App\Placetype::all();
    $view->with('placetypes', $placetypes);
});
