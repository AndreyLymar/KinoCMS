<?php

namespace App\Service\Admin\Statistic;

use App\Models\Device;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Service
{
    public function index(){
        $users = User::all();
        $usersGender = User::get()->groupBy('gender');
        $usersDate  = User::select(User::raw("count(*) as user_count, date_format(created_at, '%D %M') date"))->groupBy('date')->get();
        $schedulesDate = Schedule::get()->groupBy('date');
        $schedulesFilms = Schedule::get()->groupBy('film_id');
        $devicesDate = Device::get()->groupBy('date');

        $mobiles = [];
        $desktops = [];
        $allDevices = [];

        foreach ($devicesDate as $key => $deviceDate){
            $devices = $deviceDate->groupBy('type');
            $allDeviceForDay = 0;
            foreach ($devices as $key => $device){
                if ($key === 'mobile'){
                    $mobiles[] = count($device);
                }
                if ($key === 'desktop'){
                    $desktops[] = count($device);
                }
                $allDeviceForDay += count($device);
            }
            $allDevices[] = $allDeviceForDay;
        }
        return view('admin.statistic.index', compact('users','usersGender', 'schedulesDate', 'schedulesFilms', 'usersDate','devicesDate', 'mobiles', 'desktops', 'allDevices'));
    }
}
