<?php

use Illuminate\Support\Facades\Route;



Route::get('/',[
    'uses'  =>  'ProjectController@index',
    'as'    =>  '/'
]);

Route::get('/category-blog/{id}',[
    'uses'  =>  'ProjectController@categoryBlog',
    'as'    =>  'category-blog'
]);

Route::get('/blog-details/{id}',[
    'uses'  =>  'ProjectController@blogDetails',
    'as'    =>  'blog-details'
]);

Route::get('/sign-up',[
    'uses'  =>  'SignUpController@index',
    'as'    =>  'sign-up'
]);

Route::post('/new-sign-up',[
    'uses'  =>  'SignUpController@newSignUp',
    'as'    =>  'new-sign-up'
]);

Route::post('/visitor-logout',[
    'uses'  =>  'SignUpController@visitorLogout',
    'as'    =>  'visitor-logout'
]);

Route::get('/visitor-login',[
    'uses'  =>  'SignUpController@visitorLogin',
    'as'    =>  'visitor-login'
]);

Route::post('/visitor-sign-in',[
    'uses'  =>  'SignUpController@visitorSignIn',
    'as'    =>  'visitor-sign-in'
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/slider/add-slider',[
    'uses'  =>  'sliderController@addSlider',
    'as'    =>  'add-slider'
]);

Route::post('/slider/new-slider',[
    'uses'  =>  'sliderController@newSlider',
    'as'    =>  'new-slider'
]);

Route::get('/slider/manage-slider',[
    'uses'  =>  'sliderController@manageSlider',
    'as'    =>  'manage-slider'
]);

Route::get('/slider/edit-slider/{id}',[
    'uses'  =>  'sliderController@editSlider',
    'as'    =>  'edit-slider'
]);

Route::post('/slider/update-slider',[
    'uses'  =>  'sliderController@updateSlider',
    'as'    =>  'update-slider'
]);

Route::post('/slider/delete-slider', [
    'uses' => 'sliderController@deleteSlider',
    'as'   => 'delete-slider'
]);


Route::get('/category/add-category',[
    'uses'  =>  'categoryController@addCategory',
    'as'    =>  'add-category'
]);


Route::post('/category/new-category',[
    'uses'  =>  'categoryController@newCategory',
    'as'    =>  'new-category'
]);

Route::get('/category/manage-category',[
    'uses'  =>  'categoryController@manageCategory',
    'as'    =>  'manage-category'
]);

Route::get('/category/edit-category/{id}',[
    'uses'  =>  'categoryController@editCategory',
    'as'    =>  'edit-category'
]);

Route::post('/category/update-category',[
    'uses'  =>  'categoryController@updateCategory',
    'as'    =>  'update-category'
]);

Route::post('/category/delete-category', [
    'uses' => 'categoryController@deleteCategory',
    'as'   => 'delete-category'
]);

Route::get('/blog/add-blog', [
    'uses' => 'BlogController@addBlog',
    'as'   => 'add-blog'
]);

Route::post('/blog/new-blog', [
    'uses' => 'BlogController@newBlog',
    'as'   => 'new-blog'
]);

Route::get('/blog/manage-blog', [
    'uses' => 'BlogController@manageBlog',
    'as'   => 'manage-blog'
]);

Route::get('/category/edit-blog/{id}',[
    'uses'  =>  'BlogController@editBlog',
    'as'    =>  'edit-blog'
]);

Route::post('/category/update-blog',[
    'uses'  =>  'BlogController@updateBlog',
    'as'    =>  'update-blog'
]);

Route::post('/category/delete-blog',[
    'uses'  =>  'BlogController@deleteBlog',
    'as'    =>  'delete-blog'
]);





