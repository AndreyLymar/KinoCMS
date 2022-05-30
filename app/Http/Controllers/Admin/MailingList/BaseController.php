<?php

namespace App\Http\Controllers\Admin\MailingList;

use App\Http\Controllers\Controller;
use App\Service\Admin\MailingList\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
