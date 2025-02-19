<?php

namespace App\Nova;

use Faker\Provider\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
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
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

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
                    \Laravel\Nova\Fields\Text::make(__('Registration'), 'registration')->sortable(),
                    BelongsTo::make(__('Vehicle Model'), 'model', VehicleModel::class),
                    BelongsTo::make(__('Status'), 'status', Status::class),
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
