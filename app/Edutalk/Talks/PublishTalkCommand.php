<?php namespace Edutalk\Talks;

class PublishTalkCommand {

    public $message;

    function _construct($message)
    {
        $this->message = $message;
    }

}