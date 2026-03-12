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
        Schema::create('lsqurums', function (Blueprint $table) {
            $table->id();
            $table->integer('KODQURUM')->nullable()->index();
            $table->integer('KODQURUM_U')->nullable()->default(0);
            $table->string('ADQURUM')->nullable()->index();
            $table->string('E_POST')->nullable();
            $table->string('ADRES')->nullable();
            $table->integer('KODBANK')->nullable()->default(0);
            $table->string('MHESAB')->nullable();
            $table->string('HHESAB')->nullable();
            $table->integer('KATEQOR')->nullable()->index()->default(0);
            $table->string('VOIN')->nullable();
            $table->string('FLAG',10)->nullable();
            $table->integer('KODMHM')->nullable()->index()->default(0);

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
        Schema::dropIfExists('lsqurums');
    }
};
