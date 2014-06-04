<?php

App::error(function (\Illuminate\Session\TokenMismatchException $e) {
    return Redirect::route('index')
        ->with('message', 'Please use the forms directly from the site!');
});

App::error(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    $message = [
        'Formula' => 'The Formula you requested does not exist!',
        'Category' => 'The Category you requested does not exist!',
        'Tag' => 'The Tag you requested does not exist!',
    ];

    if (isset($message[$e->getModel()])) {
        return Redirect::route('index')
            ->with('message', $message[$e->getModel()]);
    }

    return Redirect::route('index')
        ->with('message', 'The requested entry does not exist!');
});

