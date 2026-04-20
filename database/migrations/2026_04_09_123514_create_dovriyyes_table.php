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
        Schema::create('dovriyyes', function (Blueprint $table) {
            $table->id();
            $table->integer('hesab');
            $table->string('ad')->nullable();
            $table->integer('kod')->nullable();
            $table->integer('maliye_kodu')->nullable();
            $table->string('hh')->nullable();
            $table->decimal('giris_saldo', 15, 2)->nullable();
            $table->decimal('odenis_saldo', 15, 2)->nullable();
            $table->decimal('ode_storno', 15, 2)->nullable();
            $table->decimal('hesablanma', 15, 2)->nullable();
            $table->decimal('storno', 15, 2)->nullable();
            $table->decimal('cixis_saldo', 15, 2)->nullable();
            $table->integer('idare')->nullable();
            $table->integer('ay')->nullable();
            $table->integer('il')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dovriyyes');
    }
};
