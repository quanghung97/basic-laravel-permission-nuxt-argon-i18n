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

Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::resource('admin/permission', 'Admin\\PermissionController');
    Route::resource('admin/role', 'Admin\\RoleController');
    Route::resource('admin/user', 'Admin\\UserController');
    Route::resource('admin/location', 'Admin\\LocationController');
});
Route::get('admin', function () {
    return view('admin.dashboard');
});
// Route::resource('admin/permission', 'Admin\\PermissionController');
// Route::resource('admin/role', 'Admin\\RoleController');
// Route::resource('admin/user', 'Admin\\UserController');
Route::get('/home', 'HomeController@index')->name('home');
