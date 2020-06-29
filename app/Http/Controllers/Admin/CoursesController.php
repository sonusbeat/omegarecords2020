<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesRequest;
use App\Models\Course;
use App\Models\Teacher;
use App\Traits\ImageTrait;
use Barryvdh\DomPDF\Facade as PDF;
use Intervention\Image\Facades\Image;
use Storage;

class CoursesController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('position')->paginate(8);

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'teachers' => $this->teachers(),
            'seo_options' => Course::seo_options(),
        ];

        return view('admin.courses.create', $data);
    }

    /**
     * Store a newly created courses in storage.
     *
     * @param CoursesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursesRequest $request)
    {
        // Create user object
        $course = new Course($request->except('_token', 'image', 'image_alt'));

        // Set first position by default
        $course->position = 1;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $date = date('Ymdims');
            $path = public_path().'/imagenes/courses/';
            $file_name = $request->permalink;
            $file_extension = $file->getClientOriginalExtension();

            $large_name = self::filenameTraitment($file_name, 'jpg', $date, 'large');
            $medium_name = self::filenameTraitment($file_name, 'jpg', $date, 'medium');
            $thumbnail_name = self::filenameTraitment($file_name, 'jpg', $date, 'thumbnail');

            $image_name = self::removeExtension($file_name, $file_extension, $date);

            Image::make($file->getRealPath())
                ->resize(1280, null, function ($constrain) {
                    $constrain->aspectRatio();
                })
                ->encode('jpg', 100)
                ->save($path.$large_name);

            Image::make($file->getRealPath())
                ->resize(768, null, function ($constrain) {
                    $constrain->aspectRatio();
                })
                ->encode('jpg', 100)
                ->save($path.$medium_name);

            Image::make($file->getRealPath())
                ->resize(480, null, function ($constrain) {
                    $constrain->aspectRatio();
                })
                ->fit('480', '320', function($constraint) {
                    $constraint->upsize();
                })
                ->encode('jpg', 100)
                ->save($path.$thumbnail_name);

            $course->image = $image_name;
            $course->image_alt = $request->image_alt;
        endif;

        // Create the PDF File
        $pdf = PDF::loadView('pdf.course-content', compact('course'));

        // Save PDF to Disk
        $pdf->save(public_path('pdf/'.$course->permalink.'.pdf'));

        // Save to Database
        $course->save();

        // Create session variable for message confirmation
        session()->flash('message', "El curso \"{$course->title}\" ha sido creado exitosamente");

        // Redirect to users list
        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified courses.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::CourseWithTeacher($id);

        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified courses.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $data = [
            'seo_options' => Course::seo_options(),
            'course' => $course,
            'teachers' => $this->teachers(),
            'count' => Course::count()
        ];

        return view('admin.courses.edit', $data);
    }

    /**
     * Update the specified courses in storage.
     *
     * @param CoursesRequest $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CoursesRequest $request, Course $course)
    {
        if ($course->permalink != $request->permalink) :
            $date = date('Ymdims');
            $course_large = self::filenameTraitment($request->permalink, 'jpg', $date, 'large');
            $course_medium = self::filenameTraitment($request->permalink, 'jpg', $date, 'medium');
            $course_thumbnail = self::filenameTraitment($request->permalink, 'jpg', $date, 'thumbnail');

            if(Storage::exists('/imagenes/courses/'.$course->image.'-large.jpg')) :
                Storage::move(
                    '/imagenes/courses/'.$course->image.'-large.jpg',
                    '/imagenes/courses/'.$course_large
                );
            endif;

            if(Storage::exists('/imagenes/courses/'.$course->image.'-medium.jpg')) :
                Storage::move(
                    '/imagenes/courses/'.$course->image.'-medium.jpg',
                    '/imagenes/courses/'.$course_medium
                );
            endif;

            if(Storage::exists('/imagenes/courses/'.$course->image.'-thumbnail.jpg')) :
                Storage::move(
                    '/imagenes/courses/'.$course->image.'-thumbnail.jpg',
                    '/imagenes/courses/'.$course_thumbnail
                );
            endif;

            // Update Database
            $course->update([
                "image" => self::removeExtension($request->permalink, 'jpg', $date)
            ]);
        endif;

        if($request->hasFile('image')):
            $file = $request->image;
            $date = date('Ymdims');
            $path = 'imagenes/courses/';
            $file_name = $request->permalink;
            $file_extension = $file->getClientOriginalExtension();

            $large_name = self::filenameTraitment($file_name, 'jpg', $date, 'large');
            $medium_name = self::filenameTraitment($file_name, 'jpg', $date, 'medium');
            $thumbnail_name = self::filenameTraitment($file_name, 'jpg', $date, 'thumbnail');

            $image_name = self::removeExtension($file_name, $file_extension, $date);

            if (Storage::exists($path . $course->image . '-large.jpg')) :
                Storage::delete($path . $course->image . '-large.jpg');
            endif;

            if (Storage::exists($path . $course->image . '-medium.jpg')) :
                Storage::delete($path . $course->image . '-medium.jpg');
            endif;

            if (Storage::exists($path . $course->image . '-thumbnail.jpg')) :
                Storage::delete($path . $course->image . '-thumbnail.jpg');
            endif;

            Image::make($file->getRealPath())
                ->resize(1280, null, function ($constrain) {
                    $constrain->aspectRatio();
                })
                ->encode('jpg', 100)
                ->save($path.$large_name);

            Image::make($file->getRealPath())
                ->resize(768, null, function ($constrain) {
                    $constrain->aspectRatio();
                })
                ->encode('jpg', 100)
                ->save($path.$medium_name);

            Image::make($file->getRealPath())
                ->resize(480, null, function ($constrain) {
                    $constrain->aspectRatio();
                })
                ->fit('480', '320', function($constraint) {
                    $constraint->upsize();
                })
                ->encode('jpg', 100)
                ->save($path.$thumbnail_name);

            // Update image name into database
            $course->update(['image' => $image_name]);
        endif;

        // Update the PDF if exists
        if(Storage::exists('pdf/'.$course->permalink.'.pdf')) :
            // Create the PDF File
            $pdf = PDF::loadView('pdf.course-content', compact('course'));
            Storage::delete('pdf/' . $course->permalink . '.pdf');
            $pdf->save(public_path('pdf/'.strtolower(str_replace(' ', '-', $request->permalink)).'.pdf'));
        endif;

        // Save to database
        $course->update($request->except('image'));

        // Create session variable for message confirmation
        session()->flash('message', "El curso \"{$course->title}\" ha sido actualizado exitosamente");

        // Redirect to users list
        return redirect()->route('admin.courses.index');
    }

    /**
     * Toggle active a course resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active()
    {
        $course = Course::where('id', request()->id)->select('id', 'title', 'active')->first();

        if ($course->active == 1) {
            $course->active = 0;
            $message = 'desactivado';
        } else {
            $course->active = 1;
            $message = 'activado';
        }

        // Save to database
        $course->save();

        session()->flash('message', "El equipo \"{$course->title}\" ha sido {$message} exitosamente");

        return redirect()->back();
    }

    /**
     * Remove the specified courses from storage.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $course = Course::where('id', $id)
            ->select(['id', 'title', 'image', 'permalink'])
            ->first();

        $path = 'imagenes/courses/';

        // Delete file from disk
        if(Storage::exists($path.$course->image.'-large.jpg')) :
            Storage::delete($path.$course->image.'-large.jpg');
        endif;

        if(Storage::exists($path.$course->image.'-medium.jpg')) :
            Storage::delete($path.$course->image.'-medium.jpg');
        endif;

        if(Storage::exists($path.$course->image.'-thumbnail.jpg')) :
            Storage::delete($path.$course->image.'-thumbnail.jpg');
        endif;

        if(Storage::exists('pdf/'.$course->permalink.'.pdf')) :
            Storage::delete('pdf/'.$course->permalink.'.pdf');
        endif;

        $course->delete();

        // Create session variable for message confirmation
        session()->flash('message', "el curso \"{$course->title}\" ha sido eliminado satisfactoriamente");

        // Redirect to users list
        return redirect()->route('admin.courses.index');
    }

    /**
     * Get all teachers
     *
     * @return Object
     */
    private function teachers()
    {
        return Teacher::select(['id', 'first_name', 'last_name'])->get();
    }
}
