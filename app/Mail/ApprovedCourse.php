<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Course;

class ApprovedCourse extends Mailable
{
    use Queueable, SerializesModels;

    protected $course;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Course $course )
    {
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.approved-course')
            ->subject('Curso aprobado')
            ->with([
                'course' => $this->course['title']
            ]);
    }
}
