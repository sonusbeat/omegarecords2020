<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use Mail;

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
        $form = $request->except('_token');

        Mail::send('emails.message', ['form' => $form], function ($message) use ($form)
        {
            $message->from($form['email'], $form['name']);

            $message->to('luissegura9@hotmail.com', 'Luis Segura')
                ->cc('omegarecordsgdl@gmail.com', 'Omega Records')
                ->subject('Mensaje enviado desde Omega Records');
        });

        session()->flash('message',"Su mensaje ha sido enviado satisfactoriamente,<br>pronto nos pondremos en contacto con usted");

        return redirect()->back();
    }
}
