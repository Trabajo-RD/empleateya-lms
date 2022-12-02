<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Course;
use App\Models\Module;
use App\Models\Section;
use App\Models\Lesson;

class MicrosoftCourseSeeder extends Seeder
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

        $microsoft_courses = $response->json();

        // $microsoft_courses = json_decode(file_get_contents(storage_path() . "../../public/json/microsoft_learn_catalog.json"), true);

        foreach ($microsoft_courses['courses'] as $key => $ms_course) {
            $level_id = 0;
            $type_id = 4; // Course
            $current_user_id = 3; // User 12
            $category_id = 27; // Informatica - Tecnologia
            $price_id = 1; // free
            $organization_id = 2; // Microsoft Coorporation
            $platform_id = 1; // Microsoft Learn
            $program_id = 2; // Microsoft
            $modality_id = 1; // e-learning
            $language_id = 1; // English
            $uid = (! empty($ms_course['uid'])) ? $ms_course['uid'] : Str::slug($ms_course['title']);

            // level of course
            switch($ms_course['levels'][0]) {
                case('beginner'):
                    $level_id = 1;
                    break;
                case('intermediate'):
                    $level_id = 2;
                    break;
                case('advanced'):
                    $level_id = 3;
                    break;
                default:
                    $level_id = 1;
            }

            switch($ms_course['locales']) {
                case ('en-en'):
                    $language_id = 1;
                    break;
                case ('es-es'):
                    $language_id = 2;
                    break;
                default:
            }

            $course = Course::create([
                'uid' => $uid,
                'title' => $ms_course['title'],
                'subtitle' => null,
                'summary' => $ms_course['summary'],
                'url' => $ms_course['url'],
                'duration_in_minutes' => ($ms_course['duration_in_hours'] * 60),
                'status' => 3, // published
                'slug' => Str::slug($ms_course['title']),
                'user_id' => $current_user_id,
                'level_id' => $level_id,
                'price_id' => $price_id,
                'type_id' => $type_id,
                'modality_id' => $modality_id,
                'topic_id' => null,
                'audience' => null,
                'start_date' => null,
                'end_date' => null,
                'program_id' => $program_id,
                'language_id' => $language_id
            ]);

            // foreach ($ms_course['study_guide'] as $key => $m_module_uid) {

            //     $moduleID = $m_module_uid;

            //     foreach ($microsoft_courses['modules'] as $key => $ms_module) {
            //         switch($ms_module['locale']) {
            //             case ('en-en'):
            //                 $language_id = 1;
            //                 break;
            //             case ('es-es'):
            //                 $language_id = 2;
            //                 break;
            //             default:
            //         }

            //         if ($ms_module['uid'] == $moduleID) {

            //             $section = Section::create([
            //                 'name' => $ms_module['title'],
            //                 'slug' => Str::slug($ms_module['title']),
            //                 'summary' => $ms_module['summary'],
            //                 'order' => null,
            //                 'duration_in_minutes' => $ms_module['duration_in_minutes'],
            //                 'url' => $ms_module['url'],
            //                 'course_id' => $course->id,
            //                 'type_id' => 2, // module
            //                 'language_id' => $language_id
            //             ]);

            //             foreach ($ms_module['units'] as $key => $ms_unit_id) {

            //                 $unitUID = $ms_unit_id;

            //                 foreach ($microsoft_courses['units'] as $ms_unit) {
            //                     switch($ms_unit['locale']) {
            //                         case ('en-en'):
            //                             $language_id = 1;
            //                             break;
            //                         case ('es-es'):
            //                             $language_id = 2;
            //                             break;
            //                         default:
            //                     }

            //                     if ($ms_unit['uid'] == $unitUID) {
            //                         Lesson::create([
            //                             'name' => $ms_unit['title'],
            //                             'slug' => Str::slug($ms_unit['title']),
            //                             'order' => null,
            //                             'url' => null,
            //                             'iframe' => null,
            //                             'duration_in_minutes' => $ms_unit['duration_in_minutes'],
            //                             'section_id' => $section->id,
            //                             'platform_id' => 1,
            //                             'type_id' => 3,
            //                             'language_id' => $language_id
            //                         ]);
            //                     }
            //                 }
            //             }
            //         }
            //     }
            // }
        }
    }
}
