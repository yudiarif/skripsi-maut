<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TenagaHonorer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenaga_honorer', function (Blueprint $b) {
            $b->id();
            $b->unsignedBigInteger('user_id')->nullable();
            $b->string('email', 255)->unique();
            $b->string('nama', 255)->nullable();
            $b->string('jenis_kelamin', 255)->nullable();
            $b->string('asal_kota', 255)->nullable();
            $b->string('alamat', 255)->nullable();
            $b->string('no_hp', 16)->nullable();
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
        Schema::drop('tenaga_honorer');
    }
}
