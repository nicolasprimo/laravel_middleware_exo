<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MailSended;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSendedController extends Controller
{

    public function index(){
        return view('contact');
    }

    public function store(Request $request)
    { 
        Mail::to('customer@gmail.com')->send(new MailSended($request));
        return redirect()->back();
    }
}
