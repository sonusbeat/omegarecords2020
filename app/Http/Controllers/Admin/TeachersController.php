<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeachersCreateRequest;
use App\Http\Requests\TeachersUpdateRequest;
use App\Models\Course;
use App\Models\Teacher;
use App\Traits\ImageTrait;
//use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;

class TeachersController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(8);

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seo_options = Teacher::seo_options();

        return view('admin.teachers.create', compact('seo_options'));
    }

    /**
     * Store a newly created courses in storage.
     *
     * @param TeachersCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeachersCreateRequest $request)
    {
        // Create teacher object
        $teacher = new Teacher($request->except('_token', 'image', 'image_alt'));

        if($request->hasFile('image')):
            $file = $request->file('image');
            $date = date('Ymdims');
            $path = public_path().'/imagenes/instructores/';
            $file_name = $request->image_name;
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
                ->crop('480', '360')
                ->encode('jpg', 100)
                ->save($path.$thumbnail_name);

            $teacher->image = $image_name;
            $teacher->image_alt = $request->image_alt;
        endif;

        // Save to Database
        $teacher->save();

        // Create session variable for message confirmation
        session()->flash('message', "El instructor \"{$teacher->full_name()}\" ha sido creado exitosamente");

        // Redirect to users list
        return redirect()->route('admin.teachers.index');
    }

    /**
     * Display the specified courses.
     *
     * @param Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::TeacherWithCourses($id);

        return view('admin.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified courses.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $data = [
            'seo_options' => Teacher::seo_options(),
            'teacher' => $teacher
        ];

        return view('admin.teachers.edit', $data);
    }

    /**
     * Update the specified courses in storage.
     *
     * @param TeachersUpdateRequest $request
     * @param Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeachersUpdateRequest $request, Teacher $teacher)
    {
        if ($teacher->image_name != $request->image_name) :
            $date = date('Ymdims');
            $teacher_large = self::filenameTraitment($request->image_name, 'jpg', $date, 'large');
            $teacher_medium = self::filenameTraitment($request->image_name, 'jpg', $date, 'medium');
            $teacher_thumbnail = self::filenameTraitment($request->image_name, 'jpg', $date, 'thumbnail');

            if(Storage::exists('/imagenes/instructores/'.$teacher->image.'-large.jpg')) :
                Storage::move(
                    '/imagenes/instructores/'.$teacher->image.'-large.jpg',
                    '/imagenes/instructores/'.$teacher_large
                );
            endif;

            if(Storage::exists('/imagenes/instructores/'.$teacher->image.'-medium.jpg')) :
                Storage::move(
                    '/imagenes/instructores/'.$teacher->image.'-medium.jpg',
                    '/imagenes/instructores/'.$teacher_medium
                );
            endif;

            if(Storage::exists('/imagenes/instructores/'.$teacher->image.'-thumbnail.jpg')) :
                Storage::move(
                    '/imagenes/instructores/'.$teacher->image.'-thumbnail.jpg',
                    '/imagenes/instructores/'.$teacher_thumbnail
                );
            endif;

            // Update Database
            $teacher->update([
                "image" => self::removeExtension($request->image_name, 'jpg', $date)
            ]);
        endif;

        // Save to database
        $teacher->update($request->except('image'));

        if($request->hasFile('image')):
            $file = $request->image;
            $date = date('Ymdims');
            $path = 'imagenes/instructores/';
            $file_name = $request->image_name;
            $file_extension = $file->getClientOriginalExtension();

            $large_name = self::filenameTraitment($file_name, 'jpg', $date, 'large');
            $medium_name = self::filenameTraitment($file_name, 'jpg', $date, 'medium');
            $thumbnail_name = self::filenameTraitment($file_name, 'jpg', $date, 'thumbnail');

            $image_name = self::removeExtension($file_name, $file_extension, $date);

            if (Storage::exists($path . $teacher->image . '-large.jpg')) :
                Storage::delete($path . $teacher->image . '-large.jpg');
            endif;

            if (Storage::exists($path . $teacher->image . '-medium.jpg')) :
                Storage::delete($path . $teacher->image . '-medium.jpg');
            endif;

            if (Storage::exists($path . $teacher->image . '-thumbnail.jpg')) :
                Storage::delete($path . $teacher->image . '-thumbnail.jpg');
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
                ->crop('480', '360')
                ->encode('jpg', 100)
                ->save($path.$thumbnail_name);

            // Update image name into database
            $teacher->update(['image' => $image_name]);
        endif;

        // Create session variable for message confirmation
        session()->flash('message', "El curso \"{$teacher->full_name()}\" ha sido actualizado exitosamente");

        // Redirect to users list
        return redirect()->route('admin.teachers.index');
    }

    /**
     * Toggle active a course resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active()
    {
        $teacher = Teacher::where('id', request()->id)->select('id', 'first_name', 'last_name', 'active')->first();

        if ($teacher->active == 1) {
            $teacher->active = 0;
            $message = 'desactivado';
        } else {
            $teacher->active = 1;
            $message = 'activado';
        }

        // Save to database
        $teacher->save();

        session()->flash('message', "El instructor \"{$teacher->full_name()}\" ha sido {$message} exitosamente");

        return redirect()->back();
    }

    /**
     * Remove the specified courses from storage.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::where('id', $id)
            ->select(['id', 'first_name', 'last_name', 'image'])
            ->first();

        $path = 'imagenes/instructores/';

        // Delete file from disk
        if(Storage::exists($path.$teacher->image.'-large.jpg')) :
            Storage::delete($path.$teacher->image.'-large.jpg');
        endif;

        if(Storage::exists($path.$teacher->image.'-medium.jpg')) :
            Storage::delete($path.$teacher->image.'-medium.jpg');
        endif;

        if(Storage::exists($path.$teacher->image.'-thumbnail.jpg')) :
            Storage::delete($path.$teacher->image.'-thumbnail.jpg');
        endif;

        $teacher->delete();

        // Create session variable for message confirmation
        session()->flash('message', "El instructor \"{$teacher->full_name()}\" ha sido eliminado satisfactoriamente");

        // Redirect to users list
        return redirect()->route('admin.teachers.index');
    }
}
