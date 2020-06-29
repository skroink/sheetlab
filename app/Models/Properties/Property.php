<?php

namespace App\Models\Properties;

use App\Abstracts\PropertyModel;
use Illuminate\Support\Collection;

/**
 * App\Models\Properties\Property
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $property_type
 * @property string|null $value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property wherePropertyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property whereValue($value)
 * @mixin \Eloquent
 */
class Property extends PropertyModel
{
    static function getIdentifierType(): ?string
    {
        return null;
    }

    public function transform(?Collection $reference_list)
    {
        $value = $this->getOriginal('value');

        $reference_list->filter(function (PropertyModel $model) {
            return $model->type == Modifier::getIdentifierType() && in_array($this->name, $model->references);
        })->each(function (Modifier $modifier) use (&$value) {
            $value += $modifier->value;
        });


        return $value;
    }
}
