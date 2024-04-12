<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function showForm()
    {
        return view('email.form');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'message' => 'required',
        ]);

        $email = $request->email;
        $message = $request->message;

        // Send email
        Mail::to($email)->send(new SendEmail($message ));

        return redirect('/send-email')->with('success', 'Email sent successfully!');
    }
}
