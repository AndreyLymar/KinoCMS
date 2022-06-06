<?php

namespace App\Service\Admin\Page;

use App\Models\HomePage;
use Illuminate\Http\Request;

class Service
{
    public function storeMain($data){
        HomePage::firstOrCreate($data);
    }
    public function updateMain( HomePage $home, $data){
        $home->update($data);
    }
}
