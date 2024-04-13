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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->String('num_factures')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->String('client_anonyme')->nullable();
            $table->String('type_reglement');
            $table->String('type_facture');
            $table->String('total');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
