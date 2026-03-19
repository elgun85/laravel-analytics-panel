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
        Schema::create('naryads', function (Blueprint $table) {
$table->id();
    
    // Telefon 9 rəqəmlidir, integer tam kifayətdir
    $table->integer('NOTEL')->index();
    $table->string('ADABUNE')->nullable();
    
    // Bütün kod sahələrini integer edirik ki, "Out of range" bitsin
    $table->integer('KODKUCE')->nullable();
    $table->string('MEHELLE')->nullable();
    $table->string('EV')->nullable();
    $table->string('BLOK')->nullable();
    $table->string('MENZIL')->nullable();
    $table->string('QEYD')->nullable();

    $table->integer('ABONENT')->nullable();
    $table->integer('ABONENT2')->nullable();
    $table->integer('X_KART')->nullable();
    $table->integer('KODQURUM')->nullable(); // smallInteger -> integer (xəta həlli)
    $table->integer('KODTARIF')->nullable()->index(); // smallInteger -> integer
    $table->integer('KODLQOT')->nullable();
    $table->integer('SAYTEL')->nullable();

    $table->integer('NOTEL_Y')->nullable();
    $table->string('ADABUNE_Y')->nullable();
    $table->integer('KODKUCE_Y')->nullable();
    $table->string('MEHELLE_Y')->nullable();
    $table->string('EV_Y')->nullable();
    $table->string('BLOK_Y')->nullable();
    $table->string('MENZIL_Y')->nullable();
    $table->string('QEYD_Y')->nullable();

    $table->integer('ABONENT_Y')->nullable();
    $table->integer('ABONENT2_Y')->nullable();
    $table->integer('X_KART_Y')->nullable();
    $table->integer('KODQURUM_Y')->nullable();
    $table->integer('KODTARIF_Y')->nullable();
    $table->integer('KODLQOT_Y')->nullable();
    $table->integer('SAYTEL_Y')->nullable();

    $table->integer('KODXIDMET')->nullable()->index();
    $table->string('KABEL')->nullable();
    $table->integer('MIQDAR')->nullable();
    $table->integer('NONARYAD')->nullable();

    $table->string('DTNARYAD')->nullable();
    $table->string('DTNARYAD1')->nullable();
    $table->string('TMNARYAD1')->nullable();
    $table->string('DTNARYAD2')->nullable();

    // Summa üçün 0 gəlirsə belə decimal qalması yaxşıdır, default əlavə etdik
    $table->decimal('SUMMA', 15, 2)->default(0)->nullable();
    
    $table->integer('NOQEBZ')->nullable();
    $table->string('DTQEBZ')->nullable();
    $table->integer('KODIST')->nullable();
    $table->string('FLAG')->nullable();

    $table->integer('AY')->index();
    $table->integer('IL')->index();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naryads');
    }
};
