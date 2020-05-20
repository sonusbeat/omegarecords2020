<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Equipment;
use App\Models\StudioGallery;
use App\Models\User;

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
        $data = [
            "images" => StudioGallery::select(['id', 'title', 'image', 'image_alt','description','created_at'])
                        ->orderBy('created_at','desc')
                        ->limit(5)
                        ->get(),

            "users" => User::select(['id', 'first_name', 'last_name', 'image', 'image_alt', 'created_at'])
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(),

            "equipment" => Equipment::select(['id', 'name'])
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get(),

            "courses" => Course::select(['id', 'title', 'image', 'image_alt', 'created_at', 'description'])
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get(),
        ];

        return view('admin.dashboard', $data);
    }
}
