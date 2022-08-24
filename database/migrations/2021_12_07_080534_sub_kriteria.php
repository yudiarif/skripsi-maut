<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kriteria', function (Blueprint $b){
            $b->id();
            $b->unsignedBigInteger('user_id');
            $b->unsignedBigInteger('kriteria_id');
            $b->string('rentang',255)->nullable();
            $b->integer('nilai');
            $b->foreign('user_id')->references ('id')->on('user');
            $b->foreign('kriteria_id')->references ('id')->on('kriteria');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_kriteria');
    }
}
