<?php

namespace App\Models\Properties;

use App\Abstracts\PropertyModel;
use App\Traits\FetchPropertyByReference;
use Illuminate\Support\Collection;

/**
 * App\Models\Properties\Mutation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mutation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mutation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mutation query()
 * @mixin \Eloquent
 */
class Mutation extends PropertyModel
{
    use FetchPropertyByReference;

    protected static $excluded_property_types = [
        Condition::class,
        State::class
    ];

    static function getIdentifierType(): ?string
    {
        return 'mutation';
    }

    public function transform(?Collection $reference_list)
    {
        $reference_list = $reference_list->flatten()->filter(function (PropertyModel $property)
        {
           return !in_array(get_class($property), static::$excluded_property_types);
        });

        return math_eval($this->transformReferenceInString($reference_list, $this->value));
    }


}
