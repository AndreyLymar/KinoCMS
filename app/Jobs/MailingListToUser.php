<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailingListToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $templateHtml;
    protected $users;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users, $templateHtml)
    {
        $this->users = $users;
        $this->templateHtml = $templateHtml;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->users as $user) {
            Mail::html($this->templateHtml, function($message) use ($user) {
                $message->from('kinoCms.local@gmail.com', 'Бункер "Свободу пісюнам');
                $message->subject('Бункер "Свободу пісюнам"');
                $message->to($user->email);

            });
        }

    }
}
