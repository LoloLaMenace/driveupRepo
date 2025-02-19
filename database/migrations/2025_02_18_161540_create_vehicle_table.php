<?php

use App\Models\City;
use App\Models\Energy;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('registration', 10)->unique();
            $table->string('chassis_number', 17)->unique();
            $table->unsignedInteger('contract_mileage');
            $table->unsignedInteger('mileage');
            $table->foreignIdFor(\App\Models\VehicleModel::class,)->constrained();
            $table->foreignIdFor(\App\Models\Status::class)->constrained();
            $table->foreignIdFor(City::class, 'location_city_id')->constrained();
            $table->foreignIdFor(City::class, 'location_duplicate_key_city_id')->constrained();
            $table->foreignIdFor(\App\Models\Company::class)->constrained();
            $table->foreignIdFor(Energy::class,)->constrained();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
