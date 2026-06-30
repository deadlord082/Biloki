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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('concierge_id');
            $table->string('name');
            $table->string('description');
            $table->float('price', 2);
            $table->enum('category', ['Confort & flexibilité', 'Mobilité & transport', 'Bien-être & expériences', 'Commodités pratiques'])->default('Confort & flexibilité');
            $table->enum('tarification_type', ['prix fixe', 'par personne', 'par jour', 'par unité'])->default('prix fixe');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
