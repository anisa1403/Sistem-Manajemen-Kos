<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->increments('no_kamar'); // PK
            $table->unsignedInteger('id_tipe'); // FK
            $table->string('fasilitas');
            $table->timestamps();

            $table->foreign('id_tipe')->references('id_tipe')->on('tipe_kamars')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
