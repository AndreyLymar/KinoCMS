<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service\User\Main\Service;


class MainController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function show()
    {

    }

    public function redirect()
    {
        return redirect()->route('user.main.index');
    }

}
