<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function add(Request $request)
    {
        return view ('contact.add');
    }

    function store (Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
        ]);

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->save();

        return redirect ('/')->with('error', 'Contact was created!');
    }
}
