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
        Schema::create('analytics_users', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique(); //hər gün üçün 1 record
            $table->integer('daily_count');
            $table->integer('weekly_count');
            $table->integer('monthly_count');
            $table->integer('total_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_users');
    }
};
