<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CourseMessageCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Object */
    public $course;

    /** @var array */
    public $form;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($course, $form)
    {
        $this->course = $course;
        $this->form = $form;
    }
}
