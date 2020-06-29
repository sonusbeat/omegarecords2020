<?php

namespace App\Listeners;

use App\Events\CourseMessageCreatedEvent;
use App\Mail\CourseMessageSend;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendEmailToCustomerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  CourseMessageCreatedEvent  $event
     * @return void
     */
    public function handle(CourseMessageCreatedEvent $event)
    {
        $filename = $event->course->permalink;
        $teacher = $event->course->teacher;
        $course = $event->course;

        // Send email to customer
        Mail::to($event->email)->send(
            new CourseMessageSend($event->form, $course, $filename, $teacher)
        );
    }
}
