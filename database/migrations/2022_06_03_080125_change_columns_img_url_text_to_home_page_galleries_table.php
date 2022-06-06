<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsImgUrlTextToHomePageGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_page_galleries', function (Blueprint $table) {
            $table->string('img')->nullable()->change();
            $table->string('url')->nullable()->change();
            $table->text('text')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_page_galleries', function (Blueprint $table) {
            $table->string('img')->change();
            $table->string('url')->change();
            $table->text('text')->change();
        });
    }
}
