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
                $b->float('nilai_hasil');
                $b->date('tgl_penilaian');
                $b->timestamps();
                $b->foreignId('calon_tenaga_honorer_id')->constrained('calon_tenaga_honorer')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('hasil');
    }
}
