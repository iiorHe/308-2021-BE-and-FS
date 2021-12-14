<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('year');
            $table->string('based');
            
            $table->unsignedBigInteger('debut_game_id');
            $table->timestamps();
            
            $table->foreign('debut_game_id')
                ->references('id')
                ->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devs');
    }
}
