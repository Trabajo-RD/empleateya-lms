<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Course;

class RejectCourse extends Mailable
{
    use Queueable, SerializesModels;

    protected $course;
    protected $observation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Course $course, $observation )
    {
        $this->course = $course;
        $this->observation = $observation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.reject-course')
            ->subject('Curso rechazado')
            ->with([
                'course' => $this->course['title'],
                'observation' => $this->observation
            ]);
    }
}
