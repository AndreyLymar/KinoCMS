<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsSeoToCinemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cinemas', function (Blueprint $table) {
            $table->string('seo_url')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cinemas', function (Blueprint $table) {
            $table->dropColumn('seo_url');
            $table->dropColumn('seo_description');
            $table->dropColumn('seo_title');
            $table->dropColumn('seo_keywords');
        });
    }
}
