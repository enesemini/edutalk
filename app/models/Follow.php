<?php

class Follow extends \Eloquent {
	protected $fillable = ['user_id', 'follow'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_follow';

    protected $with = ['user', 'follower'];


    public function add($user)
    {
        //check if exist

        //add user
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function follower()
    {
        return $this->belongsTo('User', 'follow');
    }




}