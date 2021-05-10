<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class LoginReminder extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $title )
    {
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('capacitate@mt.gob.do', 'Capacítate RD')
            ->subject($this->title)
            ->view('mail.login-reminder')
            ->with([
                'title' => $this->title
            ]);

    }
}
