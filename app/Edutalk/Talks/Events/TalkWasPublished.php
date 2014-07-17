<?php

namespace Edutalk\Talks\Events;


class TalkWasPublished {

    public $message;

    function _construct($message)
    {
        $this->message = $message;
    }

} 