<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('coordinates');
            $table->string('logo_img')->nullable();
            $table->boolean('status')->default(0);

            $table->string('seo_url')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();

            $table->foreignId('cinema_id')->constrained('cinemas')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('contact_pages');
    }
}
