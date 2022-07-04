<?php

namespace App\Jobs;

use App\Models\Seat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateSeatsToSchedule implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $schedule;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($schedule)
    {
     $this->schedule = $schedule;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for ($i = 1; $i <= 10; $i++) {
            if ($i == 1) {
                for ($j = 1; $j <= 12; $j++) {
                    Seat::create([
                        'row' => $i,
                        'seat' => $j,
                        'status' => 0,
                        'schedule_id' => $this->schedule->id,
                        'user_id' => null,
                    ]);
                }
            }elseif ($i == 2) {
                for ($j = 1; $j <= 14; $j++) {
                    Seat::create([
                        'row' => $i,
                        'seat' => $j,
                        'status' => 0,
                        'schedule_id' => $this->schedule->id,
                        'user_id' =>  null,
                    ]);
                }
            }elseif ($i == 3) {
                for ($j = 1; $j <= 15; $j++) {
                    Seat::create([
                        'row' => $i,
                        'seat' => $j,
                        'status' => 0,
                        'schedule_id' => $this->schedule->id,
                        'user_id' =>  null,
                    ]);
                }
            }elseif ($i == 10) {
                for ($j = 1; $j <= 20; $j++) {
                    Seat::create([
                        'row' => $i,
                        'seat' => $j,
                        'status' => 0,
                        'schedule_id' => $this->schedule->id,
                        'user_id' =>  null,
                    ]);
                }
            } else {
                for ($j = 1; $j <= 13; $j++) {
                    Seat::create([
                        'row' => $i,
                        'seat' => $j,
                        'status' => 0,
                        'schedule_id' => $this->schedule->id,
                        'user_id' =>  null,
                    ]);
                }

            }
        }
    }
}
