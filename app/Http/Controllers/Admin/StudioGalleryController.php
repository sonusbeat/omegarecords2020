<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudioGalleryRequest;
use App\Models\StudioGallery;
use App\Traits\ImageTrait;
use Intervention\Image\Facades\Image;
//use Illuminate\Http\Request;
use Storage;

class StudioGalleryController extends Controller
{
    use ImageTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the images.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = StudioGallery::orderBy('title', 'asc')->get();

        return view('admin.studio-gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new image.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.studio-gallery.create');
    }

    /**
     * Store a newly created image in storage.
     *
     * @param StudioGalleryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudioGalleryRequest $request)
    {
        // Create user object
        $image = new StudioGallery($request->only('title', 'slug', 'description', 'active'));

        if($request->hasFile('image')):
            $file = $request->file('image');
            $date = date('Ymdims');
            $path = public_path().'/imagenes/studio_gallery/';
            $file_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $large_name = self::filenameTraitment($file_name, $file_extension, $date, 'large');
            $medium_name = self::filenameTraitment($file_name, $file_extension, $date, 'medium');
            $thumbnail_name = self::filenameTraitment($file_name, $file_extension, $date, 'thumbnail');

            $image_name = self::removeExtension($file_name, $file_extension, $date);

            Image::make($file->getRealPath())
                ->resize(1280, null, function ($constrain) {
                    $constrain->aspectRatio();
                })->save($path . $large_name);

            Image::make($file->getRealPath())
                ->resize(780, null, function ($constrain) {
                    $constrain->aspectRatio();
                })->save($path . $medium_name);

            Image::make($file->getRealPath())
                ->resize(480, null, function ($constrain) {
                    $constrain->aspectRatio();
                })->save($path . $thumbnail_name);

            $image->image = $image_name;
            $image->image_alt = $request->image_alt;
        endif;

        // Save to Database
        $image->save();

        // Create session variable for message confirmation
        session()->flash('message', "La imagen \"{$image->title}\" ha sido creada exitosamente");

        // Redirect to users list
        return redirect()->route('admin.studio_gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  StudioGallery  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = StudioGallery::find($id);

        return view('admin.studio-gallery.show', compact('image'));
    }

    /**
     * Show the form for editing the specified image.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = StudioGallery::find($id);

        return view('admin.studio-gallery.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudioGalleryRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudioGalleryRequest $request, $id)
    {
        // Instantiate the image object
        $image = StudioGallery::find($id);

        // Save to database
        $image->update($request->except('image'));

        if($request->hasFile('image')):
            $file = $request->image;
            $date = date('Ymdims');
            $path = 'imagenes/studio_gallery/';
            $file_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $large_name = self::filenameTraitment($file_name, $file_extension, $date, 'large');
            $medium_name = self::filenameTraitment($file_name, $file_extension, $date, 'medium');
            $thumbnail_name = self::filenameTraitment($file_name, $file_extension, $date, 'thumbnail');

            $image_name = self::removeExtension($file_name, $file_extension, $date);

            if (Storage::exists($path . $image->image . '-large.jpg')) :
                Storage::delete($path . $image->image . '-large.jpg');
            endif;

            if (Storage::exists($path . $image->image . '-medium.jpg')) :
                Storage::delete($path . $image->image . '-medium.jpg');
            endif;

            if (Storage::exists($path . $image->image . '-thumbnail.jpg')) :
                Storage::delete($path . $image->image . '-thumbnail.jpg');
            endif;

            Image::make($file->getRealPath())
                ->resize(1280, null, function ($constrain) {
                    $constrain->aspectRatio();
                })->save($path.$large_name);

            Image::make($file->getRealPath())
                ->resize(780, null, function ($constrain) {
                    $constrain->aspectRatio();
                })->save($path.$medium_name);

            Image::make($file->getRealPath())
                ->resize(480, null, function ($constrain) {
                    $constrain->aspectRatio();
                })->save($path.$thumbnail_name);

            // Update image name into database
            $image->update(['image' => $image_name]);
        endif;

        // Create session variable for message confirmation
        session()->flash('message', "La imagen \"{$image->title}\" ha sido actualizada exitosamente");

        // Redirect to users list
        return redirect()->route('admin.studio_gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudioGallery  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = StudioGallery::where('id', $id)
            ->select(['id', 'title', 'image'])
            ->first();

        $path = 'imagenes/studio_gallery/';

        // Delete file from disk
        if(Storage::exists($path.$image->image.'-large.jpg')) :
            Storage::delete($path.$image->image.'-large.jpg');
        endif;

        if(Storage::exists($path.$image->image.'-medium.jpg')) :
            Storage::delete($path.$image->image.'-medium.jpg');
        endif;

        if(Storage::exists($path.$image->image.'-thumbnail.jpg')) :
            Storage::delete($path.$image->image.'-thumbnail.jpg');
        endif;

        $image->delete();

        // Create session variable for message confirmation
        session()->flash('message', "La imagen \"{$image->title}\" ha sido eliminada exitosamente");

        // Redirect to users list
        return redirect()->route('admin.studio_gallery.index');
    }
}
