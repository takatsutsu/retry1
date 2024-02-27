<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;



class ContactController extends Controller
{
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_ID', 'detail']);
        // return view('confirm', ['contact' => $contact]);
        return view('confirm', ['contact' => $contact]);
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_ID', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
    public function thanks()
    {
        return view('thanks');
    }
    public function admin()
    {
        return view('admin');
    }

}
