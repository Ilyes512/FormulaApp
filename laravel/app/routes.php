<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', function()
{
	return View::make('index');
}]);


/**
 * User Session
 */
Route::get('login', ['as' => 'login', 'uses' => 'SessionController@create']);
Route::post('login', ['as' => 'login', 'uses' => 'SessionController@store']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);
Route::resource('session', 'SessionController', ['only' => ['create', 'store', 'destroy']]);

Route::resource('formula', 'FormulaController');

Route::resource('tag', 'TagController');

Route::resource('category', 'CategoryController');

View::composer('partials.message', function($view) {
    $messagesTypes = [
        'message' => '',
        'message_alert' => ' alert',
        'message_warning' => ' warning',
        'message_success' => ' success',
        'message_info' => ' info',
        'message_secondary' => ' secondary'
    ];
    $view->withMessagesTypes($messagesTypes);
});