<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('national_id');
            $table->text('title');
            $table->timestamps();
            $table->foreign('national_id')->references('id')->on('nationals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('national_achievements');
    }
}
