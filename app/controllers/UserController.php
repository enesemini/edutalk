<?php

class UserController extends \BaseController {

    public function edit($username)
    {
        $user = User::where('username', $username)->first();
        if (Auth::user()->id !== $user->id){
            return Redirect::route('home');
        }

        return View::make('users.edit', compact('user'));
    }


	public function update($username)
    {
        $user = User::where('username', $username)->first();

        $updateRules = [
            'username' => "required|unique:users,username, $user->id",
            'email' => "required|email|unique:users,email, $user->id",
            'first_name' => 'required',
            'last_name' => 'required'
        ];
        $updatePasswordRules = [
            'username' => "required|unique:users,username, $user->id",
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'required|min:6|confirmed',
            'first_name' => 'required',
            'last_name' => 'required'
        ];

        $input = Input::all();

        if (input::get('password'))
        {
            $validator = Validator::make($data = Input::all(), $updatePasswordRules);

            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            $data['password'] = Hash::make($data['password']);

            $user->update($data);

            return Redirect::route('users.show', $data['username'])->withSuccess('Ihr Profil wurde erfolgreich bearbeitet!');
        }
        $validator = Validator::make($data = Input::except('password', 'password_confirmation'), $updateRules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user->update($data);


        return Redirect::route('users.show', $data['username'])->withSuccess('Ihr Profil wurde erfolgreich bearbeitet!');
    }

    public function activate($code)
    {
        $user = User::where('confirmation_code', '=', $code)->first();
        $user->confirmed = '1';
        $user->save();

        return Redirect::route('login');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (Auth::user()->id !== $user->id){
            return Redirect::route('home');
        }

        $user->delete();
        return Redirect::route('home')->withSuccess('Vielen Dank für die Benutzung von Edutalk! Ihr Profil wurde gelöscht.');
    }

}