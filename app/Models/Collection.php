<?php


namespace App\Models;


use App\Abstracts\SchemaModel;
use App\Models\Properties\Mutation;

use App\Models\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Collection extends Model
{
    protected $fillable = [
        "name"
    ];

    protected $with = [
        "collectables"
    ];

    protected $appends = [
        "collectables"
    ];

    public function collectables()
    {
        return $this->hasMany(Collectable::class);
    }

    public function getCollectablesAttribute()
    {
        return $this->collectables()->get()->transform(function (Collectable $collectable)
        {
            return $collectable->schema;
        });
    }
}
