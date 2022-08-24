<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hasil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $b){
            $b->id();
                $b->unsignedBigInteger('honorer_id')->nullable();
                $b->unsignedBigInteger('nilai')->nullable();
                $b->timestamps();
                $b->foreign('honorer_id')->references ('id')->on('tenaga_honorer');
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
