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
        Schema::create('courrier', function (Blueprint $table) {
            $table->id();
            $table->date('date_envoi');
            $table->date('date_reception');
            $table->string('objet_cour', 35);
            $table->string('description_cour', 40);
            $table->string('statut_cour', 20);
            $table->unsignedBigInteger('id_exp');
            $table->foreign('id_exp')->references('id')->on('expediteur');
            $table->unsignedBigInteger('id_des');
            $table->foreign('id_des')->references('id')->on('destinataire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courrier');
    }
};
