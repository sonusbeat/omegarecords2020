<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseMessageSend extends Mailable
{
    use Queueable, SerializesModels;

    /** @var array */
    public $form;

    /** @var object */
    public $course;

    /** @var string */
    public $filename;

    /** @var string */
    public $teacher;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form, $course, $filename, $teacher)
    {
        $this->form = $form;
        $this->course = $course;
        $this->filename = $filename;
        $this->teacher = $teacher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.course-message-send')
            ->attach(public_path('pdf/'.$this->filename), [
                'as' => $this->filename,
                'mime' => 'application/pdf'
            ])
            ->subject('Omega Records: ' . $this->course->title)
            ->from($this->teacher->email, $this->teacher->full_name());
    }
}
