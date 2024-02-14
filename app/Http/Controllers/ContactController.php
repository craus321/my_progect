<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ContactIndex()
    {
        return view('contacts.contacts');
    }


    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'website' => 'nullable|string',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required'
        ], [
            'g-recaptcha-response.required' => 'Подтвердите, что вы не робот.',
            ]);

        ContactForm::create($request->all());

        return redirect()->back()->with('success', 'Заявка успешно отправлена!');
    }


}
