<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/28/2020
 * Time: 7:36 PM
 */

namespace App\Models\Properties;


use App\Abstracts\PropertyModel;
use App\Traits\FetchPropertyByReference;
use Illuminate\Support\Collection;

/**
 * App\Models\State
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\State query()
 * @mixin \Eloquent
 */
class State extends PropertyModel
{

    use FetchPropertyByReference;

    protected static $numeric_regex = "(\-\d{1,}|\d{1,})";
    protected static $conditional_regex = "(<[=>]?|==|>=?)";

    static function getIdentifierType(): ?string
    {
        return 'state';
    }

    public function transform(?Collection $reference_list)
    {

        try {
            preg_match(sprintf("/%s%s%s/", static::$numeric_regex, static::$conditional_regex, static::$numeric_regex),
                $this->transformReferenceInString($reference_list, $this->value), $matches);

            $matches = array_splice($matches, -3);

            $eval_string = sprintf("return %s%s%s;", ...$matches);

            return eval($eval_string);
        }catch (\Throwable $e)
        {
            dd($e);
            return false;
        }
    }
}
