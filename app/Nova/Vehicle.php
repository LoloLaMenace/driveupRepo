<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Tabs\Tab;

class Vehicle extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Vehicle>
     */
    public static $model = \App\Models\Vehicle::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'registration';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'registration'
    ];

    public static $perPageOptions = [10, 20, 50];

//    public static $tableStyle = 'hight';

    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [
//            ID::make()->sortable(),
//            \Laravel\Nova\Fields\Text::make(__('Registration'), 'registration')->sortable(),
//            BelongsTo::make(__('Vehicle Model'), 'model', VehicleModel::class),
//            BelongsTo::make(__('Status'), 'status', Status::class),

            Tab::group('Detail', [
                Tab::make('Vehicle Details',[
                    ID::make()->sortable(),
                    Text::make(__('Registration'), 'registration')->sortable(),
                    BelongsTo::make(__('Vehicle Model'), 'model', VehicleModel::class),
                    BelongsTo::make(__('Status'), 'status', Status::class),
                    BelongsTo::make(__('Billing Address'), 'company', Company::class),
                    BelongsTo::make(__('Location vehicle'), 'locationCity', City::class),
                    BelongsTo::make(__('Duplicate key'),'locationDoubleKeyCity', City::class),
                    Text::make(__('Chassis number'), 'chassis_number')->sortable(),
                    Text::make(__('Last mileage'), 'mileage')->sortable(),
                    Date::make(__('Last statement'), 'last_statement')->sortable(),
                    BelongsTo::make(__('Energy'), 'energy', Energy::class),
                    Number::make(__('CO2'), 'co2_emission')->sortable(),
                    BelongsTo::make(__('Critair'), 'critair', Critair::class),
                    BelongsTo::make(__('Flocking'), 'flocking', Flocking::class),
                    BelongsTo::make('Front left', 'frontLeftTireCondition', TireCondition::class),
                    BelongsTo::make('Front right', 'frontRightTireCondition', TireCondition::class),
                    BelongsTo::make('Rear left', 'rearLeftTireCondition', TireCondition::class),
                    BelongsTo::make('Rear right', 'rearRightTireCondition', TireCondition::class),
                    BelongsTo::make(__('Contract number'), 'contract', Contract::class),
                    BelongsTo::make(__('Tire Type'), 'tireType', TireType::class),
                    BelongsTo::make(__('Lessor'), 'lessor', Lessor::class ),
                ]),
                Tab::make('Insurance Details', [
                    // @TODO: loueur / etc a mettre ici
                    BelongsTo::make(__('Driver'), 'driver', Driver::class),
                ]),
            ]),
        ];
    }

    /**
     * Get the cards available for the resource.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array<int, \Laravel\Nova\Filters\Filter>
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array<int, \Laravel\Nova\Lenses\Lens>
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array<int, \Laravel\Nova\Actions\Action>
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
