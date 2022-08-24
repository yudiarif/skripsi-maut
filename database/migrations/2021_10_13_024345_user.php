<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user',function(Blueprint $b){
            $b->id();
            $b->unsignedBigInteger('role_id');
            $b->string('nama',255)->nullable();
            $b->string('email',255)->nullable()->unique();
            $b->string('username',255)->nullable();
            $b->string('password',255)->nullable();
            $b->foreign('role_id')->references('id')->on('role');
            $b->rememberToken();
            $b->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
