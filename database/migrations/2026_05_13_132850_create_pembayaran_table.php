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
        Schema::create('pembayaran', function (Blueprint $table) {

            $table->increments('id_pembayaran');
            $table->unsignedInteger('id_sewa');
            $table->foreign('id_sewa')->references('id_sewa')->on('sewa')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_bayar');
            $table->integer('jumlah');
            $table->string('bukti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
