<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Service\User\Main\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
