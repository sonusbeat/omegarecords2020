<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\User;

class UsersController extends Controller
{
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
        $user->image = $request->image;
        $user->image_alt = $request->image_alt;

        // Check if password has been changed
        if($user->password != $request->password):
            $user->password = $request->password;
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
        $user->delete();

        // Create session variable for message confirmation
        session()->flash('message', "El usuario \"{$user->full_name()}\" ha sido eliminado exitosamente");

        // Redirect to users list
        return redirect()->route('admin.users.index');
    }
}
