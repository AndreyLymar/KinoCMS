<?php

namespace App\Http\Controllers\Admin\SpecialOffer;

class SpecialOfferController extends BaseController
{
    public function index(){
        return view('admin.special_offer.index');
    }
}
