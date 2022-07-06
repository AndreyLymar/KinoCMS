<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\Contact\StoreRequest;
use App\Http\Requests\Admin\Pages\Contact\UpdateRequest;
use App\Models\Cinema;
use App\Models\ContactPage;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
//    public $service;
//
//    public function __construct(Service $service)
//    {
//        $this->service = $service;
//    }

    public function index()
    {
        $cinemas = Cinema::all();
        $contact_pages = ContactPage::all();
        return view('admin.page.contact.index', compact('cinemas', 'contact_pages'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['logo_img'] = $data['logo_img'] ?? null;

        if ($data['logo_img'] !== null) {
            $data['logo_img'] = Storage::disk('public')->put('/images', $data['logo_img']);
        }
        ContactPage::create($data);

        return redirect()->route('admin.pages.contacts.index');
    }

    public function update(ContactPage $contact, UpdateRequest $request)
    {

        $data = $request->validated();
        $data['logo_img'] = $data['logo_img'] ?? null;

        $logo_img_old = $data['logo_img_old'] ?? null;
        unset($data['logo_img_old']);

        if ($data['logo_img'] !== null) {
            Storage::disk('public')->delete(  $data['logo_img']);
            $data['logo_img'] = Storage::disk('public')->put('/images', $data['logo_img']);
        } elseif ($logo_img_old !== null) {
            unset($data['logo_img']);
        } else {
            Storage::disk('public')->delete(  $data['logo_img']);
        }

        $contact->update($data);

        return redirect()->route('admin.pages.contacts.index');
    }


    public function destroy(ContactPage $contact)
    {

        if (isset($contact->logo_img)){
            Storage::disk('public')->delete($contact->logo_img);
        }
        $contact->delete();
        return redirect()->route('admin.pages.index');

    }

}
