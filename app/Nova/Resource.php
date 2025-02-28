<?php

namespace App\Nova;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource as NovaResource;
use Laravel\Scout\Builder as ScoutBuilder;

abstract class Resource extends NovaResource
{

    /**
     * Get the displayable label of the resource.
     *
     * @return \Stringable|string
     */
    public static function label()
    {
        return __(Str::plural(Str::title(Str::snake(class_basename(get_called_class()), ' '))));
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return \Stringable|string
     */
    public static function singularLabel()
    {
        return __(Str::singular(Str::title(Str::snake(class_basename(get_called_class()), ' '))));
    }

    /**
     * Build an "index" query for the given resource.
     */
    public static function indexQuery(NovaRequest $request, Builder $query): Builder
    {
        return $query;
    }

    /**
     * Build a Scout search query for the given resource.
     */
    public static function scoutQuery(NovaRequest $request, ScoutBuilder $query): ScoutBuilder
    {
        return $query;
    }

    /**
     * Build a "detail" query for the given resource.
     */
    public static function detailQuery(NovaRequest $request, Builder $query): Builder
    {
        return parent::detailQuery($request, $query);
    }

    /**
     * Build a "relatable" query for the given resource.
     *
     * This query determines which instances of the model may be attached to other resources.
     */
    public static function relatableQuery(NovaRequest $request, Builder $query): Builder
    {
        return parent::relatableQuery($request, $query);
    }
}
