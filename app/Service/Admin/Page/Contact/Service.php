<?php

namespace App\Service\Admin\Page\Contact;

use App\Models\ContactPage;
use App\Models\HomePage;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data){
        $data['logo_img'] = $data['logo_img'] ?? null;

        if ($data['logo_img'] !== null) {
            $data['logo_img'] = Storage::disk('public')->put('/images', $data['logo_img']);
        }
        ContactPage::create($data);

    }

    public function update($contact, $data){
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
    }

    public function destroy(ContactPage $contact)
    {

        if (isset($contact->logo_img)){
            Storage::disk('public')->delete($contact->logo_img);
        }
        $contact->delete();

    }

}
