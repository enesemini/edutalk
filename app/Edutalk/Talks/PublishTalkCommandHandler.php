<?php namespace Edutalk\Talks;

use Laracasts\Commander\CommandHandler;

class PublishTalkCommandHandler implements CommandHandler {

    /**
     * Handle the command
     */

    public function handle ($command)
    {
        Status::publish($command->message);
    }
}