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
        Schema::create('k_p_i_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_name');
            $table->text('deskripsi');
            $table->integer('sort_no');
            $table->text('parameter');
            $table->float('weight');
            $table->float('min_treshold');
            $table->float('max_treshold');
            $table->boolean('isActive');

            $table->foreignId('divisi_id')
                  ->nullable()
                  ->constrained('divisis')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('jabatan_id')
                  ->nullable()
                  ->constrained('jabatans')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('k_p_i_s');
    }
};
