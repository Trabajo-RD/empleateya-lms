<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Language;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'code' => 'en',
                'name' => 'English',
                'slug' => Str::slug('English')
            ],
            [
                'code' => 'es',
                'name' => 'Spanish',
                'slug' => Str::slug('Spanish')
            ],
            // [
            //     'code' => 'fr',
            //     'name' => 'French',
            //     'slug' => Str::slug('French')
            // ],
            // [
            //     'code' => 'it',
            //     'name' => 'Italian',
            //     'slug' => Str::slug('Italian')
            // ],
            // [
            //     'code' => 'pt',
            //     'name' => 'Portuguese',
            //     'slug' => Str::slug('Portuguese')
            // ],
        ];

        foreach($languages as $language){
            
            Language::create([
                'code' => $language['code'],
                'name' => $language['name'],
                'slug' => $language['slug']
            ]);

        }
    }
}
