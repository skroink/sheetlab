<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/26/2020
 * Time: 8:50 PM
 */

namespace App\Abstracts;


use App\Interfaces\TypeableInterface;
use App\Traits\TypeableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class PropertyModel extends TypeableAbstract
{
    public $timestamps = false;

    protected $table = "properties";

    protected $fillable = [
        "name",
        "value"
    ];

    public function transform(?Collection $reference_list)
    {
        return $this->value;
    }
}
