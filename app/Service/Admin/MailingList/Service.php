<?php

namespace App\Service\Admin\MailingList;

use App\Jobs\MailingListUser;
use App\Models\MailingList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Service
{
    public function save_img($request){
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

    public function del_img($request){
        if ($request->ajax()) {
            $file = MailingList::find($request->file_id);
            Storage::disk('public')->delete($file->template_img);
            $file->delete();

            $mailing_lists = MailingList::orderBy('id', 'desc')->get();
            return view('admin.mailing_list.ajax.files', compact('mailing_lists'));
        }
    }

    public function send($request){
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
            }

            $queue = DB::table('jobs')->get();
            $count = !empty($queue) ? count($queue) : null;
            return $count;
        }
    }

    public function sending_message(){
        $queue = DB::table('jobs')->get();
        $count = isset($queue) ? count($queue) : 0;
        return $count;
    }



}
