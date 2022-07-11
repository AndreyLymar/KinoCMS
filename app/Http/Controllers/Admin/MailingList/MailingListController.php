<?php

namespace App\Http\Controllers\Admin\MailingList;

use App\Http\Controllers\Controller;
use App\Jobs\MailingListToUser;
use App\Jobs\MailingListUser;
use App\Models\MailingList;
use App\Models\User;
use App\Service\Admin\MailingList\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class MailingListController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $users = User::all();
        $mailing_lists = MailingList::orderBy('id', 'desc')->get();

        return view('admin.mailing_list.index', compact('users', 'mailing_lists'));
    }

    public function save_img(Request $request)
    {
        return $this->service->save_img($request);
    }

    public function del_img(Request $request)
    {
       return $this->service->del_img($request);
    }

    public function send(Request $request)
    {
        return $this->service->send($request);
    }

    public function sending_message()
    {
        return $this->service->sending_message();

    }
}
