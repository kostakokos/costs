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
        $type_costs = TypeCosts::create([
            'name' => 'Pokupki'
        ]);
        
        for ($i=0; $i < 100; $i++) { 
            Costs::create([
                'type_costs_id' => $type_costs->id,
                'amount' => ($i * 10),
            ]);
        }

    }
}
