<?php namespace Edutalk\Talks;

use Laracasts\Commander\Events\EventGenerator;

class Talk extends \Eloquent {
    use EventGenerator


    /**
     * Fillable fields for a new Talk
     *
     * @var array
     */
    protected $fillable = ['message'];

    public static function publish($message)
    {
        $talk = new static(compact($message));

        $talk->raise(new TalkWasPublished);
    }

}