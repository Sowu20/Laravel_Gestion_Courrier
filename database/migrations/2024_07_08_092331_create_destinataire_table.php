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
        Schema::create('destinataire', function (Blueprint $table) {
            $table->id();
            $table->string('nom_des', 35);
            $table->string('prenom_des', 65);
            $table->string('adr_des', 30);
            $table->string('entreprise_des', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinataire');
    }
};
