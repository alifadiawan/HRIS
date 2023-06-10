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
        Schema::create('tranksaksi_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('qty');
            $table->string('subtotal');
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksis')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  $table->unsignedBigInteger('pembayaran_id');
            $table->foreign('pembayaran_id')->references('id')->on('pembayarans')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tranksaksi_details');
    }
};
