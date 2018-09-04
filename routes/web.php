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

Route::get('/', function () {    //if the user visits the home page, this is displayed
    return view('welcome');
});
Route::get('about/save', 'PagesController@reValue'); //this is displayed when the user visit the "home/about" page.
// this route goes to the PagesController, accesses the 'about' function and executes it
Route::get('about/index','PagesController@index');
Route::get('about','PagesController@about');
Route::get('articles/indices','ArticlesController@indices');
Route::post('articles/indices','ArticlesController@store');
Route::get('hotels','HotelsController@index');
Route::get('hotels/sign_up','Auth\RegisterController@sign_up');
Route::post('hotels/sign_up','Auth\RegisterController@create');
Route::get('hotels/log_in','Auth\LoginController@log_in');
Route::post('hotels/log_in','Auth\LoginController@doLogin');
Route::get('hotels/logout','Auth\LoginController@logout');
Route::get('hotels/welcome','HotelsController@welcome')->name('welcome');
Route::get('hotels/dashboard','HotelsController@dashboard');
Route::get('hotels/get/{id?}','ArticlesController@trial');
Route::get('hotels/change_role/{id}/{value}','HotelsController@change_role');
Route::get('hotels/admin/delete/{id}','HotelsController@delete');
Route::get('hotels/admin/create_user','HotelsController@create_user');
Route::post('hotels/admin/create_user','HotelsController@doCreate');
Route::get('hotels/admin/add_role','HotelsController@add_role');
Route::post('hotels/admin/add_role','HotelsController@doAdd');
Route::get('hotels/role/delete','HotelsController@del_role');

