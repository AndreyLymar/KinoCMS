<?php

namespace App\Http\Controllers\Admin\MailingList;

class MailingListController extends BaseController
{
    public function index(){
        return view('admin.mailing_list.index');
    }
}
