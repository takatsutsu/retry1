<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;



class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($request->category_id);
        return view('confirm', compact('contact', 'category'));
        // return view('confirm', ['contact' => $contact]);
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
    public function admin2()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = category::all();

        return view('admin2', compact('contacts', 'categories'));
    }
}
