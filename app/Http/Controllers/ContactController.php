<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Mail\ContactReplyMail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function view(){
        $contacts=ContactModel::all();
        return view('admin.contactreply')->with(compact('contacts'));
    }
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
        return redirect('/contact')->with('success', 'Thank you for your message!');
    }

    public function sendReply(Request $request)
    {
        $contact = ContactModel::find($request->c_id); 
        $replyMessage = $request->replyMessage;
        Mail::to($contact->email)->send(new ContactReplyMail($contact->name, $replyMessage, $contact->message));
        $contact->status=1;
        $contact->save();
        return redirect()->back()->with('success', 'Reply sent successfully!');
    }
}
