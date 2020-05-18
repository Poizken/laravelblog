<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');
Route::get('/category/{slug}', 'HomeController@category')->name('category.show');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@store');
Route::post('/comment', 'CommentsController@store');
Route::post('/subscribe', 'SubsController@subscribe');

//SIGN IN\SIGN UP\SIGN OUT
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//ADMIN
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['admin', 'ban']], function(){
    Route::get('/', 'DashboardController@index')->name('admin');
    Route::resource('/categories', 'CategoriesController', ['names' => 'admin.categories']);
    Route::resource('/tags', 'TagsController', ['names' => 'admin.tags']);
    Route::resource('/users', 'UsersController', ['names' => 'admin.users']);
    Route::get('/users/{id}/toggle', 'UsersController@toggle')->name('admin.users.toggle');
    Route::resource('/posts', 'PostsController', ['names' => 'admin.posts']);
    Route::get('/comments', 'CommentsController@index')->name('admin.comments.index');
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('admin.comments.destroy');
    Route::resource('/subscribers', 'SubsController', ['names' => 'admin.subscribers']);
});
