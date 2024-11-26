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
        Schema::create('master_productions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machine_id');
            $table->date('date');
            $table->integer('working_hour');
            $table->integer('lost_time');
            $table->integer('running_hour');
            $table->float('av_time');
            $table->float('production_target');
            $table->float('actual_output');
            $table->float('performance');
            $table->float('reject_product');
            $table->float('quality');
            $table->float('daily_oee');
            $table->float('target');
            $table->float('total_kg');

            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_productions');
    }
};
