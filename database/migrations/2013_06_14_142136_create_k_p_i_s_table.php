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
