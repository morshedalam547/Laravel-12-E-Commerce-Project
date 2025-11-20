<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function contact()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            "comment" => 'required|string',

        ]);

        Contact::create($validateData);

        return redirect()->back()->with('success', 'Your message has been set successfully!');

    }

    public function show(Contact $contact)
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.admin-contacts', compact('contacts'));
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->back()->with('danger', 'Contact message deleted successfully!');
    }

}