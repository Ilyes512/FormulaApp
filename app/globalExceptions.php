<?php

App::error(function (\Illuminate\Session\TokenMismatchException $e) {
    return Redirect::route('home')
        ->with('message', 'Please use the forms directly from the site!');
});

App::error(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    $message = [
        'Formula'  => 'The Formula you requested does not exist!',
        'Category' => 'The Category you requested does not exist or has no formulas attached!',
        'Tag'      => 'The Tag you requested does not exist or has no formulas attached!',
    ];

    if (isset($message[$e->getModel()])) {
        return Redirect::route('home')
            ->with('message', $message[$e->getModel()]);
    }

    return Redirect::route('home')
        ->with('message', 'The requested entry does not exist!');
});
