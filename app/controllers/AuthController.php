<?php

class AuthController extends \BaseController {


	public function login()
	{
        if (Auth::check())
        {
            return Redirect::route('home');
        }
		return View::make('pages.login');
	}

    public function postLogin()
    {
        $input = Input::only('email', 'password');
        if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            return Redirect::intended('/')->with('success', 'Sie sind jetzt eingeloggt.');
        }
        return 'nicht eingeloggt';
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home')->with('success', 'Sie sind jetzt ausgeloggt.');
    }

    public function register()
    {
        return View::make('pages.register');
    }

    public function postRegister()
    {
        $input = Input::only('email','username','password','password_confirmation','first_name','last_name');

        $validator = Validator::make($input, User::$rules, User::$messages);

        if ($validator->fails())
        {
            return Redirect::to('register')->withErrors($validator)->withInput();
        }
        $input['password'] = Hash::make($input['password']);

        $user = user::create(
            $input
        );
        Auth::login($user);
        return Redirect::route('home')->with('success', 'Sie sind jetzt registriert und eingeloggt.');

    }

}