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
        Schema::create('tire_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        \App\Models\TireType::create([
                'name' => '4 Saisons'
        ]);

        \App\Models\TireType::create([
            'name' => 'Ete'
        ]);

        \App\Models\TireType::create([
            'name' => 'Hiver'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tire_types');
    }
};
