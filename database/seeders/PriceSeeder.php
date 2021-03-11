<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'name' => 'Gratis',
            'value' => 0
        ]);

        Price::create([
            'name' => 'US$ 19.99',
            'value' => 19.99
        ]);

        Price::create([
            'name' => 'US$ 49.99',
            'value' => 49.99
        ]);

        Price::create([
            'name' => 'US$ 99.99',
            'value' => 99.99
        ]);
    }
}
