<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactRequest as Contact;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function saveContact(Request $request)
    {
        $user_id = auth()->id();

        $request->validate([
            'reason' => 'required',
            'description' => 'required',
        ]);

        Contact::create([
            'reason' => $request->input('reason'),
            'description' => $request->input('description'),
            'user_id' => $user_id,
        ]);
        
        return redirect()->back();
    }
}