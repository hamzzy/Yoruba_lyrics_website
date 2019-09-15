<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProposeLyrics extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Propose_lyrics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lyrics_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->longText('lyrics');
            $table->string('reason')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('Propose_lyrics');
    }


}
