<?php

class SessionController extends \BaseController
{

    static public $rules = [
        'username' => 'required',
        'password' => 'required'
    ];

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

    /**
     * Show the form for creating a new resource.
     * GET /session/create
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::check())
            return Redirect::home()
                ->withMessage('You are already logged in as user ' . Auth::user()->username);

        return View::make('users.login');
    }

    /**
     * Store a newly created resource in storage.
     * POST /session
     *
     * @return Response
     */
    public function store()
    {
        $credentials = Input::only('username', 'password');
        $remember = Input::has('remember');
        $validator = Validator::make($credentials, self::$rules);

        // Validate the given login credentials
        if ($validator->fails())
            return Redirect::route('login')
                ->withInput()
                ->withErrors($validator)
                ->withMessage('Oeps, there were some errors!');

        // Try and login the user
        if (Auth::attempt($credentials, $remember))
            return Redirect::intended('/')
                ->withMessage('You succesfully logged in!');

        // Assume login failed
        return Redirect::route('login')
            ->withInput()
            ->withMessage('Invalid Username/Password combination!');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /session/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();

        if (Auth::check())
            return Redirect::home()
                ->withMessage('Logging out failed! Try again!');

        return Redirect::home()
            ->withMessage('User ' . $user->username . ' has been logged out succesfully!');
    }

}