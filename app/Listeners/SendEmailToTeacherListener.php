<?php

namespace App\Listeners;

use App\Mail\CourseMessageForm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendEmailToTeacherListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $filename = $this->transform_title($event->course->title);
        $email = $event->course->teacher->email;

        // Send email to teacher
        Mail::to($email)->send(
            new CourseMessageForm($event->form, $event->course, $filename)
        );
    }

    private function transform_title($title)
    {
        return str_replace(' ', '-', strtolower($title)).'.pdf';
    }
}
