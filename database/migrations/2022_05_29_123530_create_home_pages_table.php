<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phone1');
            $table->unsignedBigInteger('phone2');

            $table->string('seo_url')->nullable();
            $table->text('seo_text')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();

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
        Schema::dropIfExists('home_pages');
    }
}
