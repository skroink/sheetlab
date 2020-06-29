<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/29/2020
 * Time: 6:17 PM
 */

namespace App\Traits;


use Illuminate\Database\Eloquent\Concerns\HasRelationships;

trait HasReferences
{


    public function initializeHasReferences()
    {
        $this->fillable[] = "references";
        $this->casts["references"] = "json";
    }


    public function setReferencesAttribute($value)
    {
        $this->attributes['references'] = json_encode($value);
    }

}
