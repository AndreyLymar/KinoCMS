<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsImgUrlTextToNewsSpecialOfferGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_special_offer_galleries', function (Blueprint $table) {
            $table->string('img')->nullable()->change();
            $table->string('url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('special_offer_galleries', function (Blueprint $table) {
            $table->string('img')->change();
            $table->string('url')->change();
        });
    }
}
