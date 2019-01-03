<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('MsComments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->unsignedInteger('photo_id');
            $table->unsignedInteger('user_id');
            $table->foreign('photo_id')->references('id')->on('MsPhoto')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        //
    }
}
