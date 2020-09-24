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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group([ 
    'as' => 'admin.', 
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => [ 
        'auth', 'admin',
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
});

Route::group([ 
    'as' => 'user.', 
    'prefix' => 'user', 
    'namespace' => 'User', 
    'middleware' => [ 
    'auth', 'user' 
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
});
