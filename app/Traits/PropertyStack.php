<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/26/2020
 * Time: 7:49 PM
 */

namespace App\Traits;

use App\Abstracts\PropertyModel;
use App\Abstracts\SchemaModel;
use App\Abstracts\TypeableAbstract;
use App\Models\Properties\Modifier;
use App\Models\Properties\Mutation;
use App\Models\Properties\Property;
use App\Models\Properties\State;
use App\Models\Template;
use Carbon\Traits\Modifiers;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;


/**
 * App\Traits\PropertyStack
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Properties\Property[] $properties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Properties\Mutation[] $mutations
 * @property-read int|null $properties_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Traits\PropertyStack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Traits\PropertyStack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Traits\PropertyStack query()
 * @mixin \Eloquent
 */
trait PropertyStack
{
    use HasRelationships;


    protected static $stack = [
        "properties",
        "mutations",
        "states",
        "modifiers",
    ];

    protected static $exclude_in_transformed_output = [
        "modifier",
    ];

    protected static function bootPropertyStack()
    {
        Relation::morphMap([
            strtolower(last(explode("\\", static::class))) => static::class
        ]);

        static::deleting(function ($model)
        {

            foreach(static::$stack as $property)
            {
                $model->{$property}()->delete();
            }
        });

    }

    public function properties()
    {
        return $this->morphToMany(Property::class, 'component', 'pivot_properties', 'component_id', 'property_id');
    }

    public function mutations()
    {
        return $this->morphToMany(Mutation::class, 'component', 'pivot_properties', 'component_id', 'property_id');
    }

    public function states()
    {
        return $this->morphToMany(State::class, 'component', 'pivot_properties', 'component_id', 'property_id');
    }

    public function modifiers()
    {
        return $this->morphToMany(Modifier::class, 'component', 'pivot_properties', 'component_id', 'property_id');

    }

    public function getTransformedPropertiesAttribute()
    {
        $collection = collect();


        foreach (static::$stack as $property)
        {
            $collection->add($this->getTemplateRelation($property));
            $collection->add($this->{$property});

        }


        $collection->flatten()->filter()->transform(function ($property) use($collection)  {
                $property->value = $property->transform($collection->flatten());
        });

        return $collection->flatten()->filter(function(PropertyModel $property) {
            return !in_array($property->type, static::$exclude_in_transformed_output);
        })->sortKeysDesc()->unique('name');
    }

    /**
     * Returns the given relation of all templates, if class has trait `useTemplate`
     * @param $relation
     * @return \Illuminate\Support\Collection
     * @see useTemplates
     * @see Template::$properties
     */
    protected function getTemplateRelation($relation)
    {
        if (class_uses(useTemplates::class) && $this->templates) {
            return $this->templates->pluck($relation);
        } else
            return collect();
    }
}
