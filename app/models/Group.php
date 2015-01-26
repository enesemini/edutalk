<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Group extends \Eloquent {

    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|unique:groups',
        'description' => 'required|min:10',
        'private' => 'required'

	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'description', 'private', 'user_id'];

    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function talks()
    {
        return $this->hasMany('Talk')->orderBy('id','desc');
    }

    public function upload()
    {
        return $this->morphMany('Upload', 'uploadable');
    }

}