<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'mobile' => 'required|digits:10',
            'message' => 'required|string|max:2000',
        ]);

        $contact=new ContactModel;
        $contact->name = $request->name;
        $contact->type = 'contact';
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Thank you for your message!');
    }
}
