<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Collectable extends Model
{
    public $timestamps = false;

    public function schema()
    {
        return $this->morphTo('schema');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
