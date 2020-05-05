<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudioGallery;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display dashboard view.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $images = StudioGallery::select(['id', 'title', 'image', 'image_alt','description','created_at'])
                    ->orderBy('created_at','desc')
                    ->limit(5)
                    ->get();

        $users = User::select(['id', 'first_name', 'last_name', 'image', 'image_alt', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('images','users'));
    }
}
