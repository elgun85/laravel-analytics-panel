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
        Schema::create('flkartxes', function (Blueprint $table) {
            $table->integer('NOTEL')->nullable()->index();
            $table->integer('KODQURUM')->default(0);
            $table->integer('KODTARIF')->default(0)->index();
            $table->integer('NONARYAD')->default(0);
            $table->string('DTNARYAD')->nullable();
            $table->string('DTNARYAD1')->nullable();
            $table->string('DCORR')->nullable();
            $table->decimal('SUMMA', 15, 2)->default(0.00);
            $table->integer('ABONENT')->default(0);
            $table->integer('KODIST')->default(0);
            $table->integer('SAY')->default(0);
            $table->integer('AY')->nullable()->index();
            $table->integer('IL')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flkartxes');
    }
};
