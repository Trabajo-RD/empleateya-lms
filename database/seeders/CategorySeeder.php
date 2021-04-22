<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Creatividad',
            'Negocios',
            'Tecnología',
        ];

        foreach($names as $name){

            $categories = [
                'name' => $name,
                'slug' => Str::slug($name),
            ];

            Category::create([
                'name' => $categories['name'],
                'slug' => $categories['slug'],
            ]);

        }



        // Category::create([
        //     'name' => 'Creatividad',

        // ]);

        // Category::create([
        //     'name' => 'Negocios'
        // ]);

        // Category::create([
        //     'name' => 'Tecnología'
        // ]);
    }
}
