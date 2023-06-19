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
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('goal_id');
            // $table->string('goal_name');
            $table->unsignedBigInteger('kpi_id');
            $table->foreign('kpi_id')->references('id')->on('k_p_i_s')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('members')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('goal_target');
            $table->bigIntegerinteger('goal_progress')->default(0);
            $table->unsignedBigInteger('tipe_id');
            $table->foreign('tipe_id')->references('id')->on('tipe_progress')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('grade')->nullable();
            $table->string('status');
            $table->date('tanggal_target');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members')
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
        Schema::dropIfExists('tasks');
    }
};
