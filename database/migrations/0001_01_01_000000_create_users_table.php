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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('dentists', function (Blueprint $table) {
            $table->id('dentist_id')->primary();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->integer('years_of_service');
        });

        Schema::create('membership', function (Blueprint $table) {
            $table->id('membership_id')->primary();
            $table->unsignedBigInteger('promo_id');
            $table->foreign('promo_id')->references('id')->on('promos')->constrained();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->constrained();
            $table->timestamps();
        });

        Schema::create('nurses', function (Blueprint $table) {
            $table->id('nurse_id')->primary();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->integer('years_of_service');
        });

        Schema::create('promos', function (Blueprint $table) {
            $table->id('promo_id')->primary();
            $table->decimal('discount', 5, 2);
            $table->string('description');
            $table->integer('price');
            $table->string('promo_name');
            $table->date('promo_end');
            $table->timestamps();
        });

        Schema::create('procedures', function (Blueprint $table) {
            $table->id('procedure_id')->primary();
            $table->foreign('promo_id')->references('id')->on('promos');
            $table->string('description');
            $table->integer('cost');
        });
        

        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id')->primary();
            $table->timestamps();
            $table->date('treatment_date');
            $table->time('treatment_time');
            $table->foreign('dentist_id')->references('id')->on('dentists');
            $table->foreign('nurse_id')->references('id')->on('nurses');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('procedure_id')->references('id')->on('procedures');
        });

        
        Schema::create('reschedules', function (Blueprint $table) {
            $table->id('schedule_id')->primary();
            $table->foreign('appointment_id')->references('id')->on('appointments');
            $table->date('new_schedule');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
