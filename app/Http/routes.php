<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware'=>'web'],function(){
    Route::get('look_around','LookAroundController@index')
        ->name('look_around.index');
    Route::get('dashboard','DashBoardController@index')
    ->name('dashboard.index');
    Route::auth();
    Route::resource('building','BuildingController');
    /*User*/
//    Route::get('register','')





    /*Font-End Route */
    /*Index*/

    Route::get('/','Site\HomeController@index')
        ->name('home');
    Route::resource('member','Site\MemberController');
//    Route::resource('dashboard','Site\DashBoardController');

    /*Search Package*/
    Route::get('package/search/index','Site\SearchPackageController@index')
        ->name('package.search.index');
    Route::get('package/search','Site\SearchPackageController@search')
        ->name('package.search.search');
    /*Package History*/
    Route::resource('package/history','Site\PackageHistoryController');
    /*Package*/
    Route::resource('package','Site\PackageController');

/**********Driver***********************/
    Route::group(['prefix'=>'driver'],function(){
        Route::resource('package/service_history','Driver\ServiceHistoryController');
        Route::resource('package','Driver\PackageController');
    });
/**************Admin*********************/
    Route::group(['prefix'=>'admin'],function() {
        Route::get('/','Admin\HomeController@index')->name('admin.index');
        Route::resource('package/service_history','Admin\ServiceHistoryController');
        Route::resource('package','Admin\PackageController');
        Route::resource('package_price','Admin\PackagePriceController');
        Route::resource('members','Admin\MemberController');

    });
});
