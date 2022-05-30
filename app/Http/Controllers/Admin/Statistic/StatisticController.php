<?php

namespace App\Http\Controllers\Admin\Statistic;

class StatisticController extends BaseController
{
    public function index(){
        return view('admin.statistic.index');
    }
}
