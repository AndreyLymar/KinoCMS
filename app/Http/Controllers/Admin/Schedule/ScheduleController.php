<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Hall;
use App\Models\Schedule;
use App\Service\Admin\Schedule\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function delete(Request $request)
    {
        $schedule = Schedule::find($request->schedule_id);
        $schedule->delete();
        if ($request->ajax()) {
            return true;
        }
    }

    public function store_or_update(Request $request)
    {
        return $this->service->updateOrCreate($request);
    }

    public function filter(Request $request)
    {
        return $this->service->filter($request);
    }

}
