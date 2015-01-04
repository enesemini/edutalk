<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    protected $fillable = ['username', 'email', 'password', 'first_name', 'last_name', 'confirmation_code'];
	/**
	 * Vom Model benutzte Datenbanktabelle.
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Diese Felder sind geschützt und werden nicht mitgeschickt.
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
        return $this->hasMany('Talk')->orderBy('id','desc');
    }
    public function ownsgroups()
    {
        return $this->hasMany('Group');
    }
    public function groups()
    {
        return $this->belongsToMany('Group')->withPivot('activated');
    }

    /**
     * Funktionen, die man von einem User abrufen kann
     */


    /**
     * User folgt einer Gruppe, oder folgt ihr nicht mehr
     * Beispiel: User::find(1)->addGroup(1);
     * Erklärung: Dem User mit der ID 1 wird die Gruppe mit der ID 1 zugefügt
     */
    public function enterGroup($id)
    {
        return $this->groups()->attach($id);
    }
    public function leaveGroup($id)
    {
        return $this->groups()->detach($id);
    }
    public function isInGroup($id)
    {
        if (in_array($id, $this->groups->lists('id') )) return true;
        return false;
    }
    public function hasAccessToGroup($id)
    {
        if (DB::table('group_user')->where('user_id', $this->id)->where('group_id', $id)->where('activated', 1)->get()){
            return true;
        } else{
            return false;
        }
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

    public function upload()
    {
        return $this->morphMany('Upload', 'uploadable');
    }
    public function uploads()
    {
        return $this->hasMany('Upload');
    }


}
