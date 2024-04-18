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
        Schema::create('membership', function (Blueprint $table) {
            $table->id('membership_id')->primary();
            #$table->unsignedBigInteger('promo_id');
            $table->foreignId('promo_id')->references('promo_id')->on('promos');
            #$table->unsignedBigInteger('profile_id');
            $table->foreignId('profile_id')->references('profile_id')->on('profiles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership');
    }
};
