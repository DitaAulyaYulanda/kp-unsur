<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->integer('thn_lulus');
            $table->string('pendidikan', 100);
            $table->string('pekerjaan', 100);
            $table->string('alamat', 100);
            $table->bigInteger('kontak');
            $table->string('aktivitas', 100);
            $table->string('komentar', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trackings');
    }
};
