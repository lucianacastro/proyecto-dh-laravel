<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('field');
            $table->integer('number_of_players');
            $table->timestamp('date');
            $table->unsignedInteger('creator_user_id');
            $table->foreign('creator_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('user2match', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedInteger('match_id');
            $table->foreign('match_id')
                ->references('id')->on('matches')
                ->onDelete('cascade');
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
        Schema::drop('matches');
        Schema::drop('user2match');
    }
}
