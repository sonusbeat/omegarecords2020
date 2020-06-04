<?php

namespace App\Http\Controllers\Admin;

use App\Events\CourseMessageCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseMessagesRequest;
use App\Mail\CourseMessageForm;
use App\Mail\CourseMessageSend;
use App\Models\Course;
use App\Models\CourseMessage;
use Illuminate\Support\Facades\Mail;


class CourseMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = CourseMessage::with('course:id,title')->paginate(8);

        return view('admin.course-messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = CourseMessage::whereId($id)->with('course:id,title')->first();

        return view('admin.course-messages.show', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseMessagesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseMessagesRequest $request)
    {
        // Get course with teacher
        $course = Course::where('id', $request->course_id)
            ->select('id', 'teacher_id', 'title', 'image', 'description', 'overview', 'topics', 'content', 'price', 'start_date', 'duration')
            ->with('teacher:id,first_name,last_name,email')
            ->first();

        // Create form array to create PDF
        $form = $request->except('_token', 'course_id');

        // Create new instance of message
        CourseMessage::create($request->all());

        // Send Emails Event
        event(new CourseMessageCreatedEvent($course, $form));

        // Set session variable message
        session()->flash('message', 'Tu mensaje ha sido enviado, pronto recibirás un correo electrónico con información detallada del curso');

        // Set session variable to hide the form
        session()->flash('hide-form', true);

        // Redirect to course
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = CourseMessage::whereId($id)->select('id', 'name')->first();

        // Delete from database
        $message->delete();

        session()->flash('message', 'Se elimino el mensaje de "'.$message->name.'" satisfactoriamente');

        return redirect()->route('admin.course_messages.index');
    }
}
