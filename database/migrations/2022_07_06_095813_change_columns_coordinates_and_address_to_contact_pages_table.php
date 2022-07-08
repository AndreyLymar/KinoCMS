<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsCoordinatesAndAddressToContactPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_pages', function (Blueprint $table) {
            $table->text('address')->change();
            $table->text('coordinates')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_pages', function (Blueprint $table) {
            $table->string('address')->change();
            $table->string('coordinates')->change();
        });
    }
}
