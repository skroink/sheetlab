<?php

namespace App\Models\Properties;

use App\Abstracts\PropertyModel;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Properties\Condition
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Condition query()
 * @mixin \Eloquent
 */
class Condition extends PropertyModel
{
    //
    static function getIdentifierType(): ?string
    {
        return 'condition';
    }
}
