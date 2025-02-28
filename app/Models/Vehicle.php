<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use phpDocumentor\Reflection\Location;
use PhpParser\Internal\PrintableNewAnonClassNode;

class Vehicle extends Model
{
    use HasFactory, Searchable;

    public function casts(): array
    {
        return [
            'last_statement' => 'datetime:Y-m-d',
            'attribution_date' => 'datetime:Y-m-d',
            'restitution_date' => 'datetime:Y-m-d',
        ];
    }
    public function model(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function locationCity(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class, 'location_city_id');
    }

    public function locationDoubleKeyCity(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class, 'location_duplicate_key_city_id');
    }

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function energy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Energy::class, 'energy_id');
    }

    public function critair(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Critair::class, 'critair_id');
    }

    public function flocking(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Flocking::class, 'flocking_id');
    }

    public function driver(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function tireType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TireType::class, 'tire_type_id');
    }

    public function frontLeftTireCondition(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TireCondition::class, 'front_left_tire_condition_id');
    }

    public function frontRightTireCondition(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TireCondition::class, 'front_right_tire_condition_id');
    }
    public function rearLeftTireCondition(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TireCondition::class, 'rear_left_tire_condition_id');
    }
    public function rearRightTireCondition(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TireCondition::class, 'rear_right_tire_condition_id');
    }

    public function contract(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }
    public function lessor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Lessor::class);
    }

    public function  vehicleType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    /**
     * Modify the query used to retrieve models when making all of the models searchable.
     */
    protected function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->with('model.brand');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['vehicle_model_name'] = $this->model->name;
        $array['vehicle_brand_name'] = $this->model->brand->name;

        return $array;
    }
}
