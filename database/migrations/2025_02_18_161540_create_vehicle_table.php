<?php

use App\Models\City;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Critair;
use App\Models\Driver;
use App\Models\Energy;
use App\Models\Flocking;
use App\Models\Status;
use App\Models\TireCondition;
use App\Models\Vehicle;
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
            $table->date('last_statement');
            $table->integer('co2_emission');
            $table->foreignIdFor(\App\Models\VehicleModel::class,)->constrained();
            $table->foreignIdFor(Status::class)->constrained();
            $table->foreignIdFor(City::class, 'location_city_id')->constrained();
            $table->foreignIdFor(City::class, 'location_duplicate_key_city_id')->constrained();
            $table->foreignIdFor(Company::class)->constrained();
            $table->foreignIdFor(Energy::class,)->constrained();
            $table->foreignIdFor(Critair::class,)->constrained();
            $table->foreignIdFor(Flocking::class,)->constrained();
            $table->foreignIdFor(Driver::class,)->constrained();
            $table->foreignIdFor(\App\Models\TireType::class,)->constrained();
            $table->foreignIdFor(TireCondition::class, 'front_left_tire_condition_id')->constrained();
            $table->foreignIdFor(TireCondition::class, 'front_right_tire_condition_id')->constrained();
            $table->foreignIdFor(TireCondition::class, 'rear_left_tire_condition_id')->constrained();
            $table->foreignIdFor(TireCondition::class, 'rear_right_tire_condition_id')->constrained();
            $table->foreignIdFor(Contract::class,)->constrained();
            $table->foreignIdFor(\App\Models\Lessor::class);

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
