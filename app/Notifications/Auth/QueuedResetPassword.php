<?php

namespace App\Notifications\Auth;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueuedResetPassword extends ResetPassword implements ShouldQueue
{
    use Queueable;

    public function __construct($token)
    {
        parent::__construct($token);

        $this->queue = 'email_reset-password';
    }
}
