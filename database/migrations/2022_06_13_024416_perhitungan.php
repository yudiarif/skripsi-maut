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
            $b->foreignId('calon_tenaga_honorer_id')->constrained('calon_tenaga_honorer')->onUpdate('cascade')->onDelete('cascade');
            $b->foreignId('kriteria_id')->constrained('kriteria')->onUpdate('cascade')->onDelete('cascade');
            $b->foreignId('sub_kriteria_id')->nullable()->constrained('sub_kriteria')->onUpdate('set null')->onDelete('set null');

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
