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
        Schema::create('tire_conditions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slug');
            $table->string('color');
        });

        \App\Models\TireCondition::create([
            'slug' => 'Bon état',
            'color' => '#008000'
        ]);

        \App\Models\TireCondition::create([
            'slug' => 'Mauvaise état',
            'color' => '#FF0000'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tires');
    }
};
