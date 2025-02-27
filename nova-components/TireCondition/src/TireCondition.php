<?php

namespace Xefi\TireCondition;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;
use Laravel\Nova\Util;

class TireCondition extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'tire-condition';

    /**
     * The key of the rear left tire condition
     *
     * @var \App\Models\TireCondition
     */
    public \App\Models\TireCondition $rearLeftTireCondition;

    /**
     * The key of the rear right tire condition
     *
     * @var \App\Models\TireCondition
     */
    public \App\Models\TireCondition $rearRightTireCondition;

    /**
     * The key of the front left tire condition
     *
     * @var \App\Models\TireCondition
     */
    public \App\Models\TireCondition $frontLeftTireCondition;

    /**
     * The key of the front right tire condition
     *
     * @var \App\Models\TireCondition
     */
    public \App\Models\TireCondition $frontRightTireCondition;


    /**
     * Resolve the field's value.
     *
     * @param  \Laravel\Nova\Resource|\Illuminate\Database\Eloquent\Model|object  $resource
     */
    #[\Override]
    public function resolve($resource, ?string $attribute = null): void
    {
        parent::resolve($resource, $attribute);

        $resource->loadMissing('frontRightTireCondition', 'frontLeftTireCondition', 'rearLeftTireCondition', 'rearRightTireCondition');

        $this->frontRightTireCondition = $resource->getRelation('frontRightTireCondition');
        $this->frontLeftTireCondition = $resource->getRelation('frontLeftTireCondition');
        $this->rearLeftTireCondition = $resource->getRelation('rearLeftTireCondition');
        $this->rearRightTireCondition = $resource->getRelation('rearRightTireCondition');
    }

    /**
     * Prepare the field for JSON serialization.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function jsonSerialize(): array
    {
        return with(app(NovaRequest::class), function ($request) {
            return array_merge([
                'rearLeftTireCondition' => $this->rearLeftTireCondition->toArray(),
                'rearRightTireCondition' => $this->rearRightTireCondition->toArray(),
                'frontLeftTireCondition' => $this->frontLeftTireCondition->toArray(),
                'frontRightTireCondition' => $this->frontRightTireCondition->toArray(),
            ], parent::jsonSerialize());
        });
    }
}
