<?php


namespace App\Models\Schemas;


use App\Abstracts\SchemaModel;

class Schema extends SchemaModel
{

    static function getIdentifierType(): ?string
    {
        return null;
    }
}
