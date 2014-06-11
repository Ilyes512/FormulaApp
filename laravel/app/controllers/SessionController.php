<?php

class SessionController extends \BaseController
{

    public function __construct() {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

    /**
     * Show the form for creating a new resource.
     * GET /user/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('users.login');
    }

    /**
     * Store a newly created resource in storage.
     * POST /user
     *
     * @return Response
     */
    public function store()
    {
        $credentials = Input::only('username', 'password');
        $remember = Input::has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return Redirect::intended('/')
                ->withMessage('You succesfully logged in!');
        }
        return Redirect::route('login');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /user/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();

        if (Auth::check()) {
            return Redirect::route('index')
                ->withMessage('Logging out failed! Try again!');
        }
        return Redirect::route('index')
            ->withMessage('User ' . $user->username . ' has been logged out succesfully!');
    }

}