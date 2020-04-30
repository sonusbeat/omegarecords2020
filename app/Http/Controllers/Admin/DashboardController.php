<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.dashboard');
    }
}
