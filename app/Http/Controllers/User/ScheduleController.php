<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Service\User\Schedule\Service;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->index($request);
    }

    public function show(Schedule $schedule, Request $request)
    {
        return $this->service->show($schedule, $request);
    }

}
