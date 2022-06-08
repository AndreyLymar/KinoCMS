<?php

namespace App\Http\Controllers\Admin\Hall;

use App\Http\Controllers\Controller;
use App\Service\Admin\Hall\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
