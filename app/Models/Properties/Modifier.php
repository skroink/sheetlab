<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/29/2020
 * Time: 5:34 PM
 */

namespace App\Models\Properties;


use App\Abstracts\PropertyModel;
use App\Traits\HasReferences;
use Illuminate\Support\Collection;

class Modifier extends PropertyModel
{
    use HasReferences;

    static function getIdentifierType(): ?string
    {
        return 'modifier';
    }

}
