<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    protected $fillable = ['username', 'email', 'password', 'first_name', 'last_name'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public static $rules = [
        'username' => 'required|unique:users',
        'password' => 'required|min:6|confirmed',
        'email' => 'required|email|unique:users',
        'first_name' => 'required',
        'last_name' => 'required'
    ];
    /**
    public static $messages = [
        'username.required' => 'Der Username wird benötigt!',
        'password.required' => 'Es wird ein Passwort benötigt!',
        'email.required' => 'Die Email Adresse wird benötigt!',
        'first_name.required' => 'Der Vorname wird benötigt!',
        'last_name.required' => 'Der Nachname wird benötigt!',

    ];
     */

    public function talks()
    {
        return $this->hasMany('Talk');
    }

}
