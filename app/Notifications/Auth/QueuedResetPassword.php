<?php

namespace App\Notifications\Auth;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;

class QueuedResetPassword extends ResetPassword implements ShouldQueue
{
    use Queueable;

    public function __construct($token) {
        parent::__construct($token);

        $this->queue = "email_reset-password";
    }
}
