<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;



class ContactController extends Controller
{
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
        return view('confirm', ['contact' => $contact]);
    }

    public function store(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
        // var_dump($contact);
        // return;
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
