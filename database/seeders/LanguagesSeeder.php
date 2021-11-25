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
            ],
            [
                'code' => 'es-ES',
                'name' => 'Spanish (Spain)',
            ],
            [
                'code' => 'es-DO',
                'name' => 'Spanish (Dominican Republic)',
            ],
            [
                'code' => 'fr',
                'name' => 'French',
            ],
            [
                'code' => 'it',
                'name' => 'Italian',
            ],
            [
                'code' => 'pt',
                'name' => 'Portuguese',
            ],
        ];

        foreach($languages as $language){
            
            Language::create([
                'code' => $language['code'],
                'name' => $language['name'],
            ]);

        }
    }
}
