<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseMessagesRequest;
use App\Mail\CourseMessageForm;
use App\Mail\CourseMessageSend;
use App\Models\Course;
use App\Models\CourseMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use Storage;

class CourseMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $filename = str_replace(' ', '-', strtolower($course->title)).'.pdf';
        $pdf = PDF::loadView('pdf.course-content', compact('course'));

        // Save PDF if not exists to path
        if(!Storage::exists('pdf/'.$filename)) :
            $pdf->save(public_path('pdf/'.$filename));
        endif;

        // Send email to teacher
        Mail::to($course->teacher->email, $course->teacher->full_name())->send(new CourseMessageForm($form, $course, $filename));

        // Send email to customer
        Mail::to(request('email'))->send(new CourseMessageSend($form, $course, $filename, $course->teacher));

        // Set session variable message
        session()->flash('message', 'Tu mensaje ha sido enviado, pronto recibirás un correo electrónico con información detallada del curso');

        // Set session variable to hide the form
        session()->flash('hide-form', true);

        // Redirect to course
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
