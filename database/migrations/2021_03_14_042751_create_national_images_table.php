<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bloodline_id');
            $table->text('image')->nullable();
            $table->timestamps();
            $table->foreign('bloodline_id')->references('id')->on('national_bloodlines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('national_images');
    }
}
