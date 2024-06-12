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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('num_facture');
            $table->unsignedBigInteger('produit_id');
            $table->bigInteger('quantite');
            $table->string('total');
            $table->bigInteger('edit')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('produit_id')->references('id')->on('produits');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
};
