<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsHallImgAndTopBannerImgToHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('halls', function (Blueprint $table) {
            $table->string('hall_img')->nullable()->change();
            $table->string('top_banner_img')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hals', function (Blueprint $table) {
            $table->string('hall_img')->change();
            $table->string('top_banner_img')->change();
        });
    }
}
