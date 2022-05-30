<?php

namespace App\Http\Controllers\Admin\SpecialOffer;

use App\Http\Controllers\Controller;
use App\Service\Admin\SpecialOffer\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
