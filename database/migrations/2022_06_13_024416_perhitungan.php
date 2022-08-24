<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Perhitungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungan',function(Blueprint $b){
            $b->id();
            $b->unsignedBigInteger('honorer_id');
            $b->unsignedBigInteger('kriteria_id');
            $b->unsignedBigInteger('subkriteria_id');
            $b->foreign('honorer_id')->references ('id')->on('tenaga_honorer');
            $b->foreign('kriteria_id')->references ('id')->on('kriteria');
            $b->foreign('subkriteria_id')->references ('id')->on('sub_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('perhitungan');
    }
}
