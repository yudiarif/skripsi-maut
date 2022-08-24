<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $b) {
            $b->id();
            $b->unsignedBigInteger('user_id');
            $b->string('kode', 100)->unique();
            $b->string('kriteria', 255)->nullable();
            $b->foreign('user_id')->references ('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kriteria');
    }
}
