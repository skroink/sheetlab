<?php

namespace App\Http\Controllers;

use App\Models\Collectable;
use App\Models\Collection;
use App\Models\Schemas\Sheet;
use App\Models\Template;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $schema = new Sheet(['name' => "tt"]);
        $schema->save();

        $collection = new Collection(["name" => "character sheets"]);
        $collection->save();

        $collectable = new Collectable();
        $collectable->schema()->associate($schema);
        $collectable->collection()->associate($collection);
        $collectable->save();



        return Collection::first();
        die();


        return Collection::first()->collectables()->get();


//        $string = "15>=15";
//
//
//        preg_match("/^(\d{1,})(<[=>]?|==|>=?)(\d{1,})$/", $string, $subjects);
//        "/^(\d{1,})(<[=>]?|==|>=?)(\d{1,})$/"
//        "/^\d{1,}(<[=>]?|==|>=?)\d{1,}$/"
////
//
//        $subjects = array_splice($subjects, -3);
//
//        $eval_string = sprintf("return %s%s%s;",...$subjects );
//
//        dd(eval($eval_string));
//




        $sheet = Sheet::first();

//        $sheet->templates()->attach(2);


        return $sheet->transformed_properties;

        return Sheet::first();

        return (Template::orderByDesc('id')->first()->transformed_properties);

        $template = new Template([
            "name" => "creature_template"
        ]);

        $template->save();

        $template->properties()->createMany([
            [
                "name" => "strength_score",
                "value" => 10,
            ],
            [
                "name" => "dexterity_score",
                "value" => 10,
            ],
            [
                "name" => "constitution_score",
                "value" => 10,
            ],
            [
                "name" => "intelligence_score",
                "value" => 10,
            ],
            [
                "name" => "wisdom_score",
                "value" => 10,
            ],
            [
                "name" => "charisma_score",
                "value" => 10,
            ],
            [
                "name" => "wounds",
                "value" => 0,
            ]
        ]);



        dd($template);

//        dd(Sheet::with('templates','properties','mutations')->first()->append('transformed_properties')->toArray());
    }
}
