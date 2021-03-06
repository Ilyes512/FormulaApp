<?php

// You can set 'restrict_actions' in the app.php config file to
// disable creating, deleting and editing of records.
Route::whenRegex('/formula|tag|category/', 'restrict_actions', ['post', 'put', 'patch', 'delete']);

//Route::get('/', ['as' => 'home', function () {
//    return View::make('index');
//}]);

/**
 * User Session
 */
Route::get('login', ['as' => 'login', 'uses' => 'SessionController@create']);
Route::post('login', ['as' => 'login', 'uses' => 'SessionController@store']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);
Route::resource('session', 'SessionController', ['only' => ['create', 'store', 'destroy']]);

/**
 * Resource controllers
 */
Route::resource('formula', 'FormulaController');
Route::resource('tag', 'TagController');
Route::resource('category', 'CategoryController');

/**
 * View composer
 * Todo move to seperate file
 */
//View::composer('partials.message', function ($view) {
//    $messagesTypes = [
//        'message'           => '',
//        'message_alert'     => ' alert',
//        'message_warning'   => ' warning',
//        'message_success'   => ' success',
//        'message_info'      => ' info',
//        'message_secondary' => ' secondary'
//    ];
//    $view->withMessagesTypes($messagesTypes);
//});

Route::get('/', [
    'as'   => 'home',
    'uses' => 'PagesController@home'
]);
