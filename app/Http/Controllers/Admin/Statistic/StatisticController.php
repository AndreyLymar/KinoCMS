<?php

namespace App\Http\Controllers\Admin\Statistic;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Film;
use App\Models\Schedule;
use App\Models\User;
use App\Service\Admin\Statistic\Service;
use Illuminate\Http\Client\Request;
use Mobile_Detect;

class StatisticController extends Controller
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
}
