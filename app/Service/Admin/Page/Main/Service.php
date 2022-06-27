<?php

namespace App\Service\Admin\Page\Main;

use App\Models\HomePage;

class Service
{
    public function store($data){
        HomePage::firstOrCreate($data);
    }
    public function update( HomePage $home, $data){
        $home->update($data);
    }

}
