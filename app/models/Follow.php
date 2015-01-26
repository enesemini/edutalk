<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Follow extends \Eloquent {

    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	protected $fillable = ['user_id', 'follow'];

    /**
     * Vom Model benutzte Datenbanktabelle.
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