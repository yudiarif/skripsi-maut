<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CalonTenagaHonorer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_tenaga_honorer', function (Blueprint $b) {
            $b->id();
            $b->string('nama')->nullable();
            $b->string('jenis_kelamin')->nullable();
            $b->string('asal_kota')->nullable();
            $b->string('alamat')->nullable();
            $b->string('no_hp', 16)->nullable();
            $b->string('email')->nullable();
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
        Schema::drop('calon_tenaga_honorer');
    }
}
