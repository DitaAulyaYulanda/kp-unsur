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
        Schema::create('profilsekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('alamat', 100);
            $table->string('visi', 200);
            $table->string('misi', 200);
            $table->string('sejarah', 100);
            $table->string('ekstrakulikuler', 100);
            $table->bigInteger('no_tlp');
            $table->string('email', 100);
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
        Schema::dropIfExists('profilsekolahs');
    }
};
