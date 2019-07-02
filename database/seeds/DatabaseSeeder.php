<?php

use Illuminate\Database\Seeder;

use App\Models\Costs;
use App\Models\TypeCosts;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($a=0; $a < 10; $a++) { 
            $type_costs = TypeCosts::create([
                'name' => $faker->company
            ]);

            for ($i=0; $i < 20; $i++) { 
                Costs::create([
                    'type_costs_id' => $type_costs->id,
                    'amount' => ($i * 10),
                    'description' => $faker->paragraph,
                    'created_at'  => $faker->dateTimeBetween('-7 days'),
                ]);
            }
        }
    }
}
