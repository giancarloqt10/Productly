<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Received contact form submission', $request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'file' => 'nullable|file|max:10240',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        if ($request->hasFile('file')) {
            $validatedData['file'] = $request->file('file')->store('contacts', 'public');
        }

        $contact = Contact::create($validatedData);

        \Log::info('Contact saved', ['id' => $contact->id]);

        //Mail::to($contact->email)->send(new ContactFormSubmitted($contact->toArray()));

        return redirect()->back()->with('success', 'Contact form submitted successfully!');
    }
}
