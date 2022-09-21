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
            $b->string('rentang')->nullable();
            $b->integer('nilai');
            $b->foreignId('kriteria_id')->constrained('kriteria')->onUpdate('cascade')->onDelete('cascade');
            $b->foreignId('user_id')->nullable()->constrained('users')->onUpdate('set null')->onDelete('set null');


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
