<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasOneThrough;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
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

    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Tab::group(__('Details'), [
                Tab::make(__('Vehicle Details'), [
                    Text::make(__('Registration'), 'registration')->sortable(),
                    Text::make(__('Brand'), function () {
                        return $this->model->brand->name ?? '-';
                    }),
                    BelongsTo::make(__('Vehicle Type'), 'vehicleType', VehicleType::class)->sortable()->showCreateRelationButton(),
                    BelongsTo::make(__('Vehicle Model'), 'model', VehicleModel::class)->sortable()->showCreateRelationButton(),
                    BelongsTo::make(__('Status'), 'status', Status::class)->sortable(),
                    BelongsTo::make(__('Billing Address'), 'company', Company::class)->searchable()->showCreateRelationButton(),
                    BelongsTo::make(__('Location Vehicle'), 'locationCity', City::class)->searchable()->showCreateRelationButton(),
                    BelongsTo::make(__('Duplicate Key'), 'locationDoubleKeyCity', City::class)->searchable()->showCreateRelationButton(),
                    Text::make(__('Chassis Number'), 'chassis_number')->sortable(),
                    Text::make(__('Last Mileage'), 'mileage')->sortable(),
                    Date::make(__('Last Statement'), 'last_statement')->sortable(),
                    BelongsTo::make(__('Energy'), 'energy', Energy::class)->sortable()->showCreateRelationButton(),
                    Number::make(__('CO2'), 'co2_emission')->sortable(),
                    BelongsTo::make(__('Critair'), 'critair', Critair::class)->sortable()->showCreateRelationButton(),
                    BelongsTo::make(__('Flocking'), 'flocking', Flocking::class)->sortable()->searchable()->showCreateRelationButton(),
                    \Xefi\TireCondition\TireCondition::make(__('Tire Condition'))->sortable()->hideWhenCreating()->hideWhenUpdating(),
                    BelongsTo::make(__('Front Left Tire Condition'), 'frontLeftTireCondition', TireCondition::class)
                        ->onlyOnForms(),
                    BelongsTo::make(__('Front Right Tire Condition'), 'frontRightTireCondition', TireCondition::class)
                        ->onlyOnForms(),
                    BelongsTo::make(__('Rear Left Tire Condition'), 'rearLeftTireCondition', TireCondition::class)
                        ->onlyOnForms(),
                    BelongsTo::make(__('Rear Right Tire Condition'), 'rearRightTireCondition', TireCondition::class)
                        ->onlyOnForms(),
                    BelongsTo::make(__('Tire Type'), 'tireType', TireType::class),
                ]),

                Tab::make(__('Contract & Insurance'), [
                    BelongsTo::make(__('Contract Number'), 'contract', Contract::class)->showCreateRelationButton()->searchable(),
                    Date::make(__('Start Date'), 'contract.started_at')->sortable()->hideWhenCreating(),
                    Date::make(__('End Date'), 'contract.finished_at')->sortable()->hideWhenCreating(),
                    Text::make(__('Insurer Name'), function () {
                        return $this->contract->insurer->name ?? '-';
                    }),
                    BelongsTo::make(__('Lessor'), 'lessor', Lessor::class)->sortable()->showCreateRelationButton(),
                ]),

                Tab::make(__('Driver'), [
                    BelongsTo::make(__('Driver'), 'driver', User::class)
                        ->relatableQueryUsing(function (NovaRequest $request, Builder $query) {
                            return $query->whereDoesntHave('vehicle');
                        })
                        ->sortable()
                        ->searchable()
                        ->nullable(),
                    Text::make(__('Email'), function () {
                        return $this->driver->email ?? '-';
                    }),
                    Text::make(__('License Number'), function () {
                        return $this->driver->license_number ?? '-';
                    }),
                    Date::make(__('Attribution Date'), 'attribution_date')->sortable(),
                    Date::make(__('Restitution Date'), 'restitution_date')->sortable(),
                ]),
            ])
        ];

    }

    /**
     * Get the search result subtitle for the resource.
     *
     * @return string
     */
    public function subtitle()
    {
        return "{$this->model->brand->name}, {$this->model->name}, {$this->driver->name}";
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
