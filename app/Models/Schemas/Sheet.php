<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/28/2020
 * Time: 7:08 PM
 */

namespace App\Models\Schemas;


use App\Abstracts\SchemaModel;

class Sheet extends SchemaModel
{

    static function getIdentifierType(): ?string
    {
        return 'sheet';
    }
}
