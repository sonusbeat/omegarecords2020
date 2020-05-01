<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\User;
use App\Traits\ImageTrait;
use Intervention\Image\Facades\Image;
use Storage;

class UsersController extends Controller
{
    use ImageTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('first_name', 'asc')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param UsersCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {
        // Create user object
        $user = new User($request->except('_token', 'password_confirmation'));

        if($request->hasFile('image')):
            $file = $request->image;
            $date = date('Ymdims');
            $path = public_path().'/imagenes/usuarios/';
            $file_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $large_name = self::filenameTraitment($file_name, $file_extension, $date, 'large');
            $medium_name = self::filenameTraitment($file_name, $file_extension, $date, 'medium');
            $thumbnail_name = self::filenameTraitment($file_name, $file_extension, $date, 'thumbnail');

            $image_name = self::removeExtension($file_name, $file_extension, $date);

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

            $user->image = $image_name;
            $user->image_alt = $request->image_alt;
        endif;

        // Set properties mass-assignable
        $user->type = $request->type;
        $user->active = $request->active;

        // Save to Database
        $user->save();

        // Create session variable for message confirmation
        session()->flash('message', "El usuario \"{$user->full_name()}\" ha sido creado exitosamente");

        // Redirect to users list
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified user.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param UsersUpdateRequest $request
     * @param User $user
     * @return void
     */
    public function update(UsersUpdateRequest $request, User $user)
    {
        // Set object attributes
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->active = $request->active;

        // Check if password has been changed
        if($user->password != $request->password):
            $user->password = $request->password;
        endif;

        if($request->hasFile('image')):
            $file = $request->image;
            $date = date('Ymdims');
            $path = 'imagenes/usuarios/';
            $file_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $large_name = self::filenameTraitment($file_name, $file_extension, $date, 'large');
            $medium_name = self::filenameTraitment($file_name, $file_extension, $date, 'medium');
            $thumbnail_name = self::filenameTraitment($file_name, $file_extension, $date, 'thumbnail');

            $image_name = self::removeExtension($file_name, $file_extension, $date);

            if (Storage::exists($path . $user->image . '-large.jpg')) :
                Storage::delete($path . $user->image . '-large.jpg');
            endif;

            if (Storage::exists($path . $user->image . '-medium.jpg')) :
                Storage::delete($path . $user->image . '-medium.jpg');
            endif;

            if (Storage::exists($path . $user->image . '-thumbnail.jpg')) :
                Storage::delete($path . $user->image . '-thumbnail.jpg');
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

            $user->image = $image_name;
            $user->image_alt = $request->image_alt;
        endif;

        // Save to database
        $user->save();

        // Create session variable for message confirmation
        session()->flash('message', "El usuario \"{$user->full_name()}\" ha sido actualizado exitosamente");

        // Redirect to users list
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified user from storage
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $path = 'imagenes/usuarios/';

        // Delete file from disk
        if(Storage::exists($path.$user->image.'-large.jpg')) :
            Storage::delete($path.$user->image.'-large.jpg');
        endif;

        if(Storage::exists($path.$user->image.'-medium.jpg')) :
            Storage::delete($path.$user->image.'-medium.jpg');
        endif;

        if(Storage::exists($path.$user->image.'-thumbnail.jpg')) :
            Storage::delete($path.$user->image.'-thumbnail.jpg');
        endif;

        $user->delete();

        // Create session variable for message confirmation
        session()->flash('message', "El usuario \"{$user->full_name()}\" ha sido eliminado exitosamente");

        // Redirect to users list
        return redirect()->route('admin.users.index');
    }
}
