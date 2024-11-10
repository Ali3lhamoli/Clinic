<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::orderBy('id','desc')->paginate(5);
        return view('web.admin.sections.contacts.index',compact('contacts'));
    }

    public function destroy(Contact $contact){
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success','Contact deleted successfully');
    }
}
