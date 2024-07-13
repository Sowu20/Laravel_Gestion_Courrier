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
        Schema::create('expediteur', function (Blueprint $table) {
            $table->id();
            $table->string('nom_exp', 35);
            $table->string('prenom_exp', 65);
            $table->string('adr_exp', 35);
            $table->string('entreprise_exp', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expediteur');
    }
};
