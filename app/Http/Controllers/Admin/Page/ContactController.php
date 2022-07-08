<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\Contact\StoreRequest;
use App\Http\Requests\Admin\Pages\Contact\UpdateRequest;
use App\Models\Cinema;
use App\Models\ContactPage;
use App\Service\Admin\Page\Contact\Service;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $cinemas = Cinema::all();
        $contact_pages = ContactPage::all();
        return view('admin.page.contact.index', compact('cinemas', 'contact_pages'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.pages.contacts.index');
    }

    public function update(ContactPage $contact, UpdateRequest $request)
    {

        $data = $request->validated();

        $this->service->update($contact, $data);

        return redirect()->route('admin.pages.contacts.index');
    }


    public function destroy(ContactPage $contact)
    {

      $this->service->destroy($contact);
        return redirect()->route('admin.pages.index');

    }

}
