<?php

class AuthController extends \BaseController {

    // Benutzer will sich einloggen, wird auf Startseite umgeleitet falls schon eingeloggt
	public function login()
	{
        if (Auth::check())
        {
            return Redirect::route('home')->with('message', 'Sie sind bereits eingeloggt.');;
        }
		return View::make('pages.login');
	}

    // Benutzer postet Login Daten und Daten werden authentifiziert
    public function postLogin()
    {
        $input = Input::only('email', 'password');

        if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            return Redirect::intended('/')->with('success', 'Sie sind jetzt eingeloggt.');
        }
        return 'nicht eingeloggt';
    }

    // Benutzer wird ausgeloggt und auf die Startseite umgeleitet
    public function logout()
    {
        Auth::logout();
        return Redirect::route('home')->with('success', 'Sie sind jetzt ausgeloggt.');
    }

    // Benutzer will sich registrieren, wird auf Startseite umgeleitet falls eingeloggt
    public function register()
    {
        if (Auth::check())
        {
            return Redirect::route('home')->with('message', 'Sie sind bereits eingeloggt. Falls Sie einen neuen Benutzer erstellen möchten, melden Sie sich bitte zuerst ab.');
        }
        return View::make('pages.register');
    }

    // Benutzer postet Daten zur Registrierung,
    // Daten werden authentifiziert,
    // falls dies fehlschlägt, wird er wieder zum Formular umgeleitet (mit den Fehlermeldungen),
    // falls Authentifizierung erfolgreich ist, wird ein neuer User erstellt und man wird eingeloogt
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