<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => Type::PATH
            ],
            [
                'name' => Type::MODULE
            ],
            [
                'name' => Type::UNIT
            ],
            [
                'name' => Type::COURSE
            ],
            [
                'name' => Type::SECTION
            ],
            [
                'name' => Type::LESSON
            ],
            [
                'name' => Type::WORKSHOP
            ],
            [
                'name' => Type::ACTIVITY
            ],
            [
                'name' => Type::TASK
            ],
            [
                'name' => Type::VIDEO
            ],
            [
                'name' => Type::AUDIO
            ],
            [
                'name' => Type::IMAGE
            ],
            [
                'name' => Type::POST
            ],
            [
                'name' => Type::PAGE
            ],
            [
                'name' => Type::BANNER
            ]
        ];

        foreach($types as $key => $type)
        {
            Type::create([
                'name' => $type['name'],
                'slug' => Str::slug($type['name'])
            ]);
        }
    }
}
