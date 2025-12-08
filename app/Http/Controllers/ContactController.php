<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // (Optional) Email sending
        // Mail::to('support@example.com')->send(new ContactMail($validated));

        return back()->with('success', 'Message sent successfully!');
    }
}
