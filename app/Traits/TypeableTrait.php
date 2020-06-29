<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/26/2020
 * Time: 8:35 PM
 */

namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasGlobalScopes;

/**
 * Trait Property
 * @package App\Traits
 */
trait TypeableTrait
{
    use HasGlobalScopes;

    protected static function booted()
    {
        static::addGlobalScope('type',function (Builder $query) {
            $query->where('type',static::getIdentifierType());
        });

        // auto-sets values on creation
        static::creating(function ($query) {
            $query->type = static::getIdentifierType();
        });

        parent::booted();
    }
}
