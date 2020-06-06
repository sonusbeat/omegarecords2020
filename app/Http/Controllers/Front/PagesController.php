<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Mail\ContactForm;
use App\Models\Course;
use App\Models\Equipment;
use App\Models\EquipmentCategory;
use App\Models\StudioGallery;
use App\Models\Teacher;
use Illuminate\Support\Facades\Mail;

//use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display the index page
     *
     * @return Response
     */
    public function index()
    {
        return view('front/pages/index');
    }

    /**
     * Display the studio page
     *
     * @return Response
     */
    public function studio()
    {
        $images = StudioGallery::where('active', true)->orderBy('position', 'asc')->paginate(16);

        return view('front/pages/studio', compact('images'));
    }

    /**
     * Display the equipment page
     *
     * @return Response
     */
    public function equipment()
    {
        $categories = EquipmentCategory::with(['equipment' => function($query) {
            $query->select(['id', 'equipment_category_id', 'name', 'active'])
                ->where('active', 1)
                ->orderBy('name', 'asc');
        }])->select(['id', 'name', 'position'])
            ->where('active', 1)->orderBy('position', 'asc')->get();

        return view('front/pages/equipment', compact('categories'));
    }

    /**
     * Display the services and services page
     *
     * @return Response
     */
    public function services()
    {
        return view('front/pages/services');
    }

    /**
     * Display the courses page
     *
     * @return Response
     */
    public function courses()
    {
        $courses = Course::CoursesWithTeacher();

        return view('front/pages/courses', compact('courses'));
    }

    /**
     * Display course page
     *
     * @param string $permalink
     * @return Response
     */
    public function course($permalink)
    {
        $course = Course::PublicCourseWithTeacher($permalink);

        return view('front/pages/course', compact('course'));
    }

    /**
     * Display teacher page
     *
     * @return Response
     */
    public function teachers()
    {
        $teachers = Teacher::where('active', true)
            ->select('id', 'first_name', 'last_name', 'image', 'image_alt', 'biography')
            ->paginate(8);

        return view('front/pages/teachers', compact('teachers'));
    }

    /**
     * Display teacher page
     *
     * @param integer $id
     * @return Response
     */
    public function teacher($id)
    {
        $teacher = Teacher::TeacherWithCoursesForPublic($id);

        return view('front/pages/teacher', compact('teacher'));
    }

    /**
     * Display the contact page
     *
     * @return Response
     */
    public function contact()
    {
        return view('front/pages/contact');
    }

    /**
     * Display the contact page
     *
     * @return Response
     */
    public function email(EmailRequest $request)
    {
        Mail::to('luissegura9@hotmail.com')->send(new ContactForm($request->except('_token')));

        session()->flash('message', 'Email enviado satisfactoriamente');

        return redirect(route('front.contact'));
    }
}
