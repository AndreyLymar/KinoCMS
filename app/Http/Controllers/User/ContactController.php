<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use App\Models\Page;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactPage::all();
        $pages = Page::where('status', 1)->get();

        return view('user.contact.index', compact('contacts',  'pages'));
    }


}
