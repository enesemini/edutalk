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

        $user = User::where('email', '=', $input['email'])->first();
        if($user->confirmed == '0')
        {
            return Redirect::back()->with('error', 'Bitte Aktivieren Sie Ihren Account.');
        } elseif (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            return Redirect::intended('/dashboard')->with('success', 'Sie sind jetzt eingeloggt.');
        }
        return Redirect::back()->with('error', 'Anmelden fehlgeschlagen.');
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
        $input = Input::only('email','username','password','confirmation_code','password_confirmation','first_name','last_name');

        $validator = Validator::make($input, User::$rules);

        if ($validator->fails())
        {
            return Redirect::route('register')->withErrors($validator)->withInput();
        }
        $input['password'] = Hash::make($input['password']);
        $input['confirmation_code'] = str_random(60);
        $user = user::create(
            $input
        );

        Mail::send('emails.auth.activate', ['link' => URL::route('activate', $input['confirmation_code']), 'name' => $input['first_name']], function($message)
        {
            $message->to(Input::get('email'), Input::get('first_name'))->subject('Aktivieren Sie Ihren Edutalk Account');
        });


        return Redirect::route('login')->with('success', 'Sie erhalten in kürze eine Email zur Aktivierung Ihres Accounts.');

    }

}