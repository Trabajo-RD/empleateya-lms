<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Section;
use Illuminate\Support\Facades\Http;

class MicrosoftCourseUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locale = 'es-es';

        $response = Http::get('https://docs.microsoft.com/api/learn/catalog/?locale=' . $locale);

        $microsoftcourses = $response->json();

        // $microsoftcourses = json_decode(file_get_contents(storage_path() . "../../public/json/microsoft_learn_catalog.json"), true);

        foreach ($microsoftcourses['courses'] as $key => $mscourse) {

            $capacitateCourse = DB::table('courses')->where('uid', '=', $mscourse['uid'])->first();

            foreach ($mscourse['study_guide'] as $key => $mscoursemodule) {

                $msCourseModuleUid = $mscoursemodule['uid'];

                foreach($microsoftcourses['modules'] as $key => $msmodule) {

                    if ($msmodule['uid'] == $msCourseModuleUid) {

                        Section::create([
                            'title' => $msmodule['title'],
                            'uid' => $msmodule['uid'],
                            'slug' => Str::slug($msmodule['title']),
                            'summary' => $msmodule['summary'],
                            'order' => null,
                            'course_id' => $capacitateCourse->id,
                            'type_id' => 2, // module
                        ]);
                    }
                }

            }
        }
    }
}
