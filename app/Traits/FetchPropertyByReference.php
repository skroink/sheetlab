<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/28/2020
 * Time: 10:04 PM
 */

namespace App\Traits;


use App\Abstracts\PropertyModel;
use Illuminate\Support\Collection;

trait FetchPropertyByReference
{


    protected function replaceReferenceInString(?Collection $collection, $subject, callable $callable)
    {
        $subject = $subject ?: $this->value;

        $collection = collect($collection->flatten());
        return preg_replace_callback('/\{(.*?)\}/', function ($matches) use ($collection, $callable) {
            $key = last($matches);

            $property = $this->fetchProperties($collection, $key)->transform(function ($property) use ($collection, $callable) {
                return $callable($collection, $property);
            })->last();

            return $property ?: null;
        }, $subject);
    }


    public function transformReferenceInString(?Collection $collection, $subject)
    {
        return $this->replaceReferenceInString($collection, $subject, function ($reference_list,? PropertyModel $property) {
            return $property->transform($reference_list);
        });
    }

    protected function fetchProperties(?Collection $collection, $key): ?Collection
    {
        $collection = collect($collection->flatten());
        return $collection->filter(function ($property) use ($key) {
            return $property->name == $key;
        });
    }


}
