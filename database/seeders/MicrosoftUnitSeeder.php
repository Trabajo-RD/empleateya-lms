<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Unit;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MicrosoftUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $locale = 'es';

        // $response = Http::get('https://docs.microsoft.com/api/learn/catalog/?locale=' . $locale);

        // $microsoft_courses = $response->json();

        $microsoft_courses = json_decode(file_get_contents(storage_path() . "../../public/json/microsoft_learn_catalog.json"), true);

        foreach($microsoft_courses['modules'] as $msmodule){

            $moduleRecord = Module::where('uid', '=', $msmodule['uid'])->first();

            foreach($msmodule['units'] as $unit_id){

                $unitID = $unit_id;

                foreach($microsoft_courses['units'] as $unit){
                    if($unitID === $unit['uid']){

                        $unitRecord = Unit::where('uid', '=', $unit['uid'])->first();

                       if ($unitRecord === null) {
                            $unit_inserted = Unit::create([
                                'uid' => $unit['uid'],
                                'title' => $unit['title'],
                                'slug' => Str::slug($unit['title']),
                                'summary' => null,
                                // 'order' => null,
                                'url' => null,
                                'iframe' => null,
                                'duration_in_minutes' => $unit['duration_in_minutes'],
                                // 'module_id' => (!is_null($moduleRecord)) ? $moduleRecord->id : null,
                                // 'platform_id' => 1,
                                'type_id' => 3
                            ]);

                            if(!is_null($moduleRecord)) {
                                $module = Module::find($moduleRecord->id);
                                $module->units()->attach($unit_inserted->id);
                            }
                            // Log::info($unit_inserted);
                       } else {
                        // $module = Module::find($moduleRecord->id);
                        $moduleRecord->units()->attach($unitRecord->id);
                       }
                    }
                }

            }

        }
    }
}
