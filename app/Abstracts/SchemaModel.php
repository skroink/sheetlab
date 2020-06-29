<?php

namespace App\Abstracts;


use App\Traits\PropertyStack;
use App\Traits\useTemplates;


/**
 * App\Models\Schema
 * @mixin \Eloquent
 */
abstract class SchemaModel extends TypeableAbstract
{
    use useTemplates, PropertyStack;

    public $timestamps = false;

    protected $table = "schemas";

    protected $fillable = [
        "name"
    ];

    protected $appends = [
        "transformed_properties"
    ];
}
