<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('role')->default(0);
            $table->unsignedBigInteger('phone');
            $table->string('pseudonym')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade')->onUpdate('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
