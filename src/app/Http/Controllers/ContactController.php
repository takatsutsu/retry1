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
        return view('index', compact('categories',));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($request->category_id);
        return view('confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
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


    public function search(Request $request)
    {
        if ($request->has('reset')) {
            return redirect('/admin2')->withInput();
        }
        $query = Contact::query();

        if (!empty($request->random_search)) {
            $query->where('email', 'like', '%' . $request->random_search . '%')
                ->orWhere('detail', 'like', '%' . $request->random_search . '%')->orWhere('first_name', 'like', '%' . $request->random_search . '%')->orWhere('last_name', 'like', '%' . $request->random_search . '%');;

            $contacts = $query->with('category')->paginate(7);
            $categories = category::all();

            return view('admin2', compact('contacts', 'categories'));
        }


        $query = Contact::query();


        if (!empty($request->gender_search)) {
            $query->where('gender', $request->gender_search);


            $contacts = $query->with('category')->paginate(7);
            $categories = category::all();

            return view('admin2', compact('contacts', 'categories'));
        }

        $query = Contact::query();

        if (!empty($request->category_search)) {
            $query->where('category_id', $request->category_search);


            $contacts = $query->with('category')->paginate(7);
            $categories = category::all();

            return view('admin2', compact('contacts', 'categories'));
        }
    }
}
