<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
                $table->id();
                $table->time('time');
                $table->date('date');
                $table->unsignedInteger('price');

                $table->foreignId('film_id')->constrained('films')->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('hall_id')->constrained('halls')->onUpdate('cascade')->onDelete('cascade');

                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
