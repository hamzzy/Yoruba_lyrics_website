<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLyricsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lyrics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('artist');
            $table->string('slug')->unique();
            $table->string('Album')->nullable();
            $table->string('title');
            $table->string('tag');
            $table->longText('content');
            $table->string('featuring')->nullable();
            $table->string('producer')->nullable();
            $table->string('written_by')->nullable();
            $table->date('release_date');
            $table->string('Album_art');
            $table->string('audio_link')->nullable();
            $table->string('video_link')->nullable();
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
        Schema::dropIfExists('lyrics');
    }
}
