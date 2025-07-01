<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('contact',compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only(['category_id',
        'first_name','last_name','gender','email','phone1','phone2','phone3','address','building','detail']);
        $category = Category::find($contact['category_id']);
        return view('contact_confirm', compact('contact' , 'category'));
    }

    public function store(Request $request) {
        $contact = $request->only(['category_id','first_name','last_name','gender','email','phone1','phone2','phone3','address','building','detail']);
        $contact['tel'] = $contact['phone1'] . $contact['phone2'] . $contact['phone3'];
        Contact::create($contact);
        return view('thanks');
    }

    public function back(Request $request){
        $request->flash();
        return redirect()->route('contact.create');
    }
}
