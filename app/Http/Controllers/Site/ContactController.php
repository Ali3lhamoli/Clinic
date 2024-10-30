<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('web.site.pages.contact');
    }

    public function store(StoreContactRequest $Request){
        Contact::create($Request->validated());
        return view('web.site.pages.thank')->with('success', 'Your message has been sent.');
    }
}
