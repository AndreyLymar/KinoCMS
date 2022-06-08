<?php

namespace App\Http\Controllers\Admin\SpecialOffer;

use App\Http\Requests\Admin\SpecialOffer\createOrUpdateRequest;
use App\Models\SpecialOffer;

class SpecialOfferController extends BaseController
{
    public function index(){
       $special_offers = SpecialOffer::all();
        return view('admin.special_offer.index', compact('special_offers'));
    }

    public function create(){
        return view('admin.special_offer.create');
    }

    public function edit(SpecialOffer $special_offer){
        return view('admin.special_offer.edit',compact('special_offer'));
    }

    public function updateOrCreate(createOrUpdateRequest $request){
        $data = $request->validated();
        $this->service->updateOrCreate($data);
        return redirect()->route('admin.special_offers.index');
    }

    public function destroy(SpecialOffer $special_offer){
        $special_offer->delete();
        return redirect()->route('admin.special_offers.index');

    }
}
