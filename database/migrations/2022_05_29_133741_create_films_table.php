<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->string('img');
            $table->string('url_movie_trailer');
            $table->boolean('type_3d')->default(1);
            $table->boolean('type_2d')->default(1);
            $table->boolean('type_imax')->default(1);

            $table->string('seo_url')->nullable();
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
        Schema::dropIfExists('films');
    }
}
