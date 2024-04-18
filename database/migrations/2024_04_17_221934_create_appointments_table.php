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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id')->primary();
            $table->timestamps();
            $table->date('treatment_date');
            $table->time('treatment_time');
            $table->unsignedBigInteger('dentist_id');
            $table->foreign('dentist_id')->references('dentist_id')->on('dentists');
            $table->unsignedBigInteger('nurse_id');
            $table->foreign('nurse_id')->references('nurse_id')->on('nurses');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('profile_id')->on('profiles');
            $table->unsignedBigInteger('procedure_id');
            $table->foreign('procedure_id')->references('procedure_id')->on('procedures');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
