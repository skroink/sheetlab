<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Schemas\Sheet::class, 1)->create()->each(function (\App\Models\Schemas\Sheet $schema) {

            factory(\App\Models\Properties\Property::class,10)->create()->each(function (\App\Models\Properties\Property $property) use ($schema)
            {
                $schema->properties()->attach($property);

            });

            factory(\App\Models\Properties\Mutation::class,10)->create()->each(function (\App\Models\Properties\Mutation $property) use ($schema)
            {
                $schema->mutations()->attach($property);

            });

        });
    }
}
