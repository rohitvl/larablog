<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


//Route::get('/admin', function(){
//      return view('admin.index');
//  })->middleware('admin');



//every request to the AdminUsersController will pass through the middleware admin
Route::group(['middleware'=>'admin'], function(){

    Route::resource('admin/users', 'AdminUsersController');

});



Route::group(['middleware'=>'auth'], function(){

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('/admin/comments', 'AdminCommentsController');


});
