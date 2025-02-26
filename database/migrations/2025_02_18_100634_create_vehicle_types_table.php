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
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        \App\Models\VehicleType::create([
            'name' => '2 Places'
        ]);
        \App\Models\VehicleType::create([
            'name' => '5 Places'
        ]);
        \App\Models\VehicleType::create([
            'name' => 'Utilitaire'
        ]);
        \App\Models\VehicleType::create([
            'name' => 'Moto'
        ]);
        \App\Models\VehicleType::create([
            'name' => '5 Places Grand Voyageur'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_types');
    }
};
