<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Talk extends \Eloquent {

    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	// Add your validation rules here
	public static $rules = [
		 'message' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['message', 'group_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function group()
    {
        return $this->belongsTo('Group');
    }

    public function upload()
    {
        return $this->morphMany('Upload', 'uploadable');
    }
}