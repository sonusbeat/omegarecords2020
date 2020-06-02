<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseMessageForm extends Mailable
{
    use Queueable, SerializesModels;

    /** @var array */
    public $form;

    /** @var object */
    public $course;

    /** @var string */
    public $filename;

    /**
     * Create a new message instance.
     * @param array $form
     * @param string $course
     * @param string $filename
     */
    public function __construct($form, $course, $filename)
    {
        $this->form = $form;
        $this->course = $course;
        $this->filename = $filename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.course-message-form')
            ->subject('Solicitud de información de: ' . $this->course->title)
            ->from($this->form['email'], $this->form['name']);
    }
}
