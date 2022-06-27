<?php

namespace App\Http\Controllers\Admin\SpecialOffer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecialOffer\createOrUpdateRequest;
use App\Models\SpecialOffer;
use App\Service\Admin\SpecialOffer\Service;

class SpecialOfferController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $special_offers = SpecialOffer::all();
        return view('admin.special_offer.index', compact('special_offers'));
    }

    public function create()
    {
        return view('admin.special_offer.create');
    }

    public function edit(SpecialOffer $special_offer)
    {
        return view('admin.special_offer.edit', compact('special_offer'));
    }

    public function updateOrCreate(createOrUpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->updateOrCreate($data);
        return redirect()->route('admin.special_offers.index');
    }

    public function destroy(SpecialOffer $special_offer)
    {
        $this->service->delete($special_offer);
        return redirect()->route('admin.special_offers.index');

    }
}
