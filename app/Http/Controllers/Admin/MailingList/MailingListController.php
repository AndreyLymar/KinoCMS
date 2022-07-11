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
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|file',
            ]);
            $validated = $validator->validated();

            $templateFile = Storage::disk('public')->put('/mailing', $request->file);
            MailingList::create([
                'title' => $request->title,
                'template_img' => $templateFile
            ]);

            $mailing_lists = MailingList::orderBy('id', 'desc')->get();
            return view('admin.mailing_list.ajax.files', compact('mailing_lists'));
        }
    }

    public function del_img(Request $request)
    {
        if ($request->ajax()) {
            $file = MailingList::find($request->file_id);
            Storage::disk('public')->delete($file->template_img);
            $file->delete();

            $mailing_lists = MailingList::orderBy('id', 'desc')->get();
            return view('admin.mailing_list.ajax.files', compact('mailing_lists'));
        }
    }

    public function send(Request $request)
    {
        if ($request->ajax()) {
            if ($request->users === 'allUser') {
                $users = User::get();
            } else {
                $users = User::whereIn('id', $request->users)->get();
            }
            $template = MailingList::where('id', $request->template)->first();
            $templateHtml = Storage::disk('public')->get($template->template_img);

            foreach ($users as $user) {
                $email = $user->email;
                dispatch(new MailingListUser($email, $templateHtml));
//                Mail::html($templateHtml, function ($message) use ($email) {
//                    $message->from('kinoCms.local@gmail.com', 'Бункер "Свободу пісюнам');
//                    $message->subject('Бункер "Свободу пісюнам"');
//                    $message->to($user->email);
//                })->dispatch();
            }

            $queue = DB::table('jobs')->get();
            $count = !empty($queue) ? count($queue) : null;
            return $count;
        }
    }

    public function sending_message()
    {
        $queue = DB::table('jobs')->get();
        $count = isset($queue) ? count($queue) : 0;
        return $count;
    }
}
