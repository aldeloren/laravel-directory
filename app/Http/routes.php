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

// Display General search form, and provide search tips
Route::get('/', 'pagesController@home');

// Display all search results for given query
Route::get('/search/{term}', 'SearchController@searchList');

// Redirect users to homepage if no search term is present
Route::get('search/', function() { return redirect('/');}); 

// Display detailed information about an individual returned from the search
Route::get('/detail/{id}',
  [
    'as'   => 'detail',
    'uses' => 'DetailController@index'
  ]);
