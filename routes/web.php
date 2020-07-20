<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
//include all routes here those u want to restrict access to.
    Route::resource('/todo', 'TodoController');
    //{{-----------------   this will check the task as completed-------------------------------------}}
    Route::put('/todos/{todo}/complete/', '\App\Http\Controllers\TodoController@complete')
        ->name('todoComplete');

//{{-----------------   this will uncheck the task -------------------------------------}}
    Route::delete('/todos/{todo}/incomplete/', '\App\Http\Controllers\TodoController@incomplete')
        ->name('todoIncomplete');


});

//NOTE: auth here specifies the name of the middleware we are using.


//{{---------------this form will get every doto from db and display it---------------}}
//Route::get('/todos/','\App\Http\Controllers\TodoController@index')->name('todoIndex');

//{{-----------------this function will just return the create view---------------}}
//Route::get('/todos/create/','\App\Http\Controllers\TodoController@create')->name('todo.create');

//{{-----------------------this form will store the newly created doto in db i.e post method---------------}}
//Route::post('/todos/create/','\App\Http\Controllers\TodoController@store');

//{{-----------------------this form will get the id of the selected doto and edit it and submit it---------------}}
//Route::get('/todos/{todo}/edit/','\App\Http\Controllers\TodoController@edit');

//{{----------------- the edit route submit data to this route.-------------------------------------}}
//Route::patch('/todos/{todo}/update/','\App\Http\Controllers\TodoController@update')->name('todoUpdate');

//{{-----------------   this will grab the id of the selected route and delete it from db-------------------------------------}}
//Route::delete('/todos/{todo}/delete/','\App\Http\Controllers\TodoController@delete')
//    ->name('todoDelete');

//above all methods are provided by resource in laravel
//php artisan make:controller TodoController --resource  //this command will make controller along with these  common resource routes
//if we have already created controller with same names then we can create resource routes using
//php artisan make:resource resourceName
//Route::resource('todo', 'TodoController');   //name must be same as the controller.


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'UserController@index');
//Route::post('/upload',function (){
//    dd(request()->all());
//});---or--------
//Route::post('/upload',function(\Illuminate\Http\Request $request){
////    dd($request->file('image'));-------or-------
////    dd($request->image);  //both the methods will give description of image.
////    dd($request->hasFile('image'));   //this will return just true or false
//    $request->image->store('images');
//    return "uploadeddddd!!!";
//
//});
Route::post('/upload', 'UserController@uploadAvatar');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
