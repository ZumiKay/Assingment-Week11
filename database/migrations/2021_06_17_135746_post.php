<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post' , function (Blueprint $table){
            $table -> id();
            $table -> string('title');
            $table -> string('description');
            $table -> bigInteger('user_id');
            $table -> string('author')->nullable();
            $table -> string('category_id')->nullable();
            $table ->timestamps();
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
