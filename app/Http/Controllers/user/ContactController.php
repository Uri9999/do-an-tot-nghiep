<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('user-.contact-index');
    }

    public function store(ContactStoreRequest $request)
    {
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->save();
        return redirect()->route('getHomeIndex');
    }
}
