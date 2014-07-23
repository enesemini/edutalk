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
     * Verbindungen zu anderen Tabellen
     */
    public function talks()
    {
        return $this->hasMany('Talk');
    }
    public function ownsgroups()
    {
        return $this->hasMany('Group');
    }
    public function groups()
    {
        return $this->belongsToMany('Group')->withTimestamps();
    }

    /**
     * Funktionen, die man von einem User abrufen kann
     */


    /**
     * User folgt einer Gruppe, oder folgt ihr nicht mehr
     * Beispiel: User::find(1)->addGroup(1);
     * Erklärung: Dem User mit der ID 1 wird die Gruppe mit der ID 1 zugefügt
     */
    public function addGroup($id)
    {
        return $this->groups()->attach($id);
    }
    public function removeGroup($id)
    {
        return $this->groups()->detach($id);
    }

    /**
     * Angemeldeter User folgt dem User mit der ID $id
     * Beispiel: User:find(1)->follow(2)
     * Erläuterung: Der User mit der ID 1 folgt dem User mit der ID 2
     */
    public function follow($id)
    {
        //return false, wenn der User dem zweiten User bereits folgt
        if (count(Follow::where('user_id',Auth::user()->id)->where('follow', $id)->first()) > 0)
        {
            return false;
        }
        // Eintrag in die user_follow Tabelle
        Follow::create([
            'user_id' => Auth::user()->id,
            'follow' => $id
        ]);
    }

    /**
     * Angemeldeter User will dem User mit der ID $id nicht mehr folgen
     * Beispiel: User:find(1)->unfollow(2)
     * Erläuterung: Der User mit der ID 1 folgt dem User mit der ID 2 nicht mehr
     */
    public function unfollow($id)
    {
        // prüft, ob der User dem anderen User überhaupt folgt und löscht den Eintrag aus der Tabelle
        $follow = Follow::where('user_id',Auth::user()->id)->where('follow', $id)->first();
        if (count($follow) > 0)
        {
            $follow->delete();
        }
    }

    /**
     * Es werden alle Benutzer ausgelesen, denen der Benutzer folgt
     * Beispiel: User:find(1)->following();
     */
    public function following()
    {
        return Follow::where('user_id', $this->id)->get();
    }
    /**
     * Es werden alle Benutzer ausgelesen, die dem Benutzer folgen
     * Beispiel: User:find(1)->followers();
     */
    public function followers()
    {
        return Follow::where('follow', $this->id)->get();
    }



}
