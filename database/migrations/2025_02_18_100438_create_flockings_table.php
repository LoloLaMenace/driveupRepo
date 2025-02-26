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
        Schema::create('flockings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        \App\Models\Flocking::create([
            'name' => 'XEFI'
        ]);
        \App\Models\Flocking::create([
            'name' => 'NEXEREN'
        ]);
        \App\Models\Flocking::create([
            'name' => 'FORTALICIA'
        ]);
        \App\Models\Flocking::create([
            'name' => 'ANGELINKS'
        ]);
        \App\Models\Flocking::create([
            'name' => 'IDCOM'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flockings');
    }
};
