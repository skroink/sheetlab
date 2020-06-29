<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/26/2020
 * Time: 8:52 PM
 */

namespace App\Interfaces;


interface TypeableInterface
{
    static function getIdentifierType() : ?string;
}
