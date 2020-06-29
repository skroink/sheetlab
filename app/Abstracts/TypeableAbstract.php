<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/28/2020
 * Time: 7:12 PM
 */

namespace App\Abstracts;


use App\Interfaces\TypeableInterface;
use App\Traits\TypeableTrait;
use Illuminate\Database\Eloquent\Model;

abstract class TypeableAbstract  extends Model implements TypeableInterface
{
    use TypeableTrait;
}
