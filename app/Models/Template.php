<?php

namespace App\Models;

use App\Traits\PropertyStack;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Template
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template query()
 * @mixin \Eloquent
 */
class Template extends Model
{
    use PropertyStack;

    protected $fillable = [
        "name"
    ];
}
