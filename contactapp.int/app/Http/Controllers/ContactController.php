<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function add(Request $request)
    {
        return view('contact.add');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|uniquex:contacts',
        ]);

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->save();

        return redirect('/')->with('error', 'Contact was created!');
    }

    public function edit(int $id)
    {
        try {
            $contact = Contact::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect('/')->with('error', 'Contact not found!');
        }

        return view('contact.edit', ['contact' => $contact]);
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        try {
            $contact = Contact::findOrFail($id);
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->save();
        } catch (ModelNotFoundException $e) {
            return redirect('/')->with('error', 'Contact not found!');
        }


        return redirect()->route('contact.edit', ['id' => $id])->with('msg', 'Contact was updated!');
    }

    public function delete(Request $request, int $id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();
        } catch (ModelNotFoundException $e) {
            return redirect('/')->with('error', 'Contact not found!');
        }

        return redirect()->route('home')->with('error', 'Contact was deleted!');
    }
}
