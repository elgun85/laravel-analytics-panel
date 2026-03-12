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
        Schema::dropIfExists('flkarts');

        Schema::create('flkarts', function (Blueprint $table) {
            $table->id(); 
            $table->integer('NOTEL')->nullable()->index();
            $table->integer('KODQURUM')->default(0);
            $table->integer('X_KART')->default(0);
            $table->integer('KODTARIF')->default(0)->index();
            $table->integer('RENTA')->default(0);
            $table->integer('KODLQOT')->default(0);
            $table->integer('ABONENT')->default(0)->index();
            $table->integer('ABONENT2')->default(0)->index();
            $table->integer('SAYTEL')->default(0);
            $table->decimal('SUMMA0', 15, 2)->default(0.00);
            $table->decimal('SUMMA', 15, 2)->default(0.00);
            $table->integer('NONARYAD')->default(0);
            $table->integer('UZEL')->default(0);
            $table->string('DTNARYAD')->nullable();
            $table->string('DTNARYAD1')->nullable();
            $table->string('TMNARYAD1')->nullable();
            $table->string('DTNARYAD2')->nullable();
            $table->integer('KODXIDMET')->default(0)->index();
            $table->integer('KODIST')->default(0);
            $table->bigInteger('AD_UCRET_K')->default(0);
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
        Schema::dropIfExists('flkarts');
    }
};
