<?php

class Group extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|unique:groups',
        'description' => 'required|min:10',
        'private' => 'required'

	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'description', 'private', 'user_id'];

    public function user()
    {
        return $this->belongsTo('User');
    }

}