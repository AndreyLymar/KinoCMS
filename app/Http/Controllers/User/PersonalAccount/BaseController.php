<?php

namespace App\Http\Controllers\User\PersonalAccount;

use App\Http\Controllers\Controller;
use App\Service\User\PersonalAccount\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
