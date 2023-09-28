<?php

namespace App\Http\Controllers;
use App\Http\Request\ContactFormRequest;
use App\Http\Mail\SendMail;
use Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact (ContactFormRequest $request)
    {
        Mail::to('kennedy@unitas.co.ke')->queue(new SendEmail($request->validated()));
        session()->flash("success", "Your message has been sent!");
        return redirect()-> back();

    }
}
