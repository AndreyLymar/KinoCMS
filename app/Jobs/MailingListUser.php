<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailingListUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $email;
    protected $templateHtml;

    public function __construct($email, $templateHtml)
    {
        $this->email = $email;
        $this->templateHtml = $templateHtml;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = $this->email;
        Mail::html($this->templateHtml, function ($message) use ($email) {
            $message->from('kinoCms.local@gmail.com', 'KinoCms');
            $message->subject('KinoCms');
            $message->to($email);

        });
    }
}
