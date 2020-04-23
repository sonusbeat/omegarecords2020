<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Mail\ContactForm;
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
        return view('front/pages/studio');
    }

    /**
     * Display the equipo page
     *
     * @return Response
     */
    public function equipment()
    {
        return view('front/pages/equipment');
    }

    /**
     * Display the rates and services page
     *
     * @return Response
     */
    public function services()
    {
        return view('front/pages/services');
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
