<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use Carbon\Carbon;    //created_at_日付だけ取得のため



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
    public function admin()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = category::all();

        return view('admin', compact('contacts', 'categories'));
    }


    public function search(Request $request)
    {

        $query = Contact::query();

        if ($request->has('reset')) {
            return redirect('/admin2')->withInput();
        }

        if (!empty($request->random_search)) {
            $query->where('email', 'like', '%' . $request->random_search . '%')
                ->orWhere('detail', 'like', '%' . $request->random_search . '%')->orWhere('first_name', 'like', '%' . $request->random_search . '%')->orWhere('last_name', 'like', '%' . $request->random_search . '%');

        }


        if (!empty($request->gender_search)) {
            $query->where('gender', $request->gender_search);

        }



        if (!empty($request->category_search)) {
            $query->where('category_id', $request->category_search);

        }


        if (!empty($request->date_search)) {
            $query->wheredate('created_at', $request->date_search);
        }
        
        $contacts = $query->with('category')->paginate(7);
        $categories = category::all();

        return view('admin', compact('contacts', 'categories'));
    }
}
