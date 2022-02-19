<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin-lte.contact.index')->with('contacts', Contact::all());
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->back();
    }
}
