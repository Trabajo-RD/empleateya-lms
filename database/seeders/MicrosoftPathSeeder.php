<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\LearningPath;
use App\Models\Image;
use App\Models\Module;
use App\Models\Unit;

class MicrosoftPathSeeder extends Seeder
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

        foreach ($microsoft_courses['learningPaths'] as $ms_course) {

            // $ms_course_language = substr($ms_course['url'], 27, 5); // nueva implementacion

            $level_id = 0;
            $language_id = 1;
            $type_id = 1; // Learning Path
            $current_user_id = 3; // User Capacitate with role instructor
            $platform_id = 1; // Microsoft Learn
            $program_id = 2; // Microsoft
            $uid = $ms_course['uid'];

            // level of path
            switch($ms_course['levels'][0]){
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

            switch($ms_course['locale'] ){
                case ('en-us'):
                    $language_id = 1;
                    break;
                case ('es-es'):
                    $language_id = 2;
                    break;
                default:
            }

            // switch( $ms_course_language ){
            //     case ('en-us'):
            //         $language_id = 1;
            //         break;
            //     case ('es-es'):
            //         $language_id = 2;
            //         break;
            //     default:
            // }

            $paths = LearningPath::create([
                'uid' => $ms_course['uid'],
                'title' => $ms_course['title'],
                'subtitle' => null,
                'slug' => Str::slug($ms_course['title']),
                'summary' => $ms_course['summary'],
                'url' => $ms_course['url'],
                'duration_in_minutes' => $ms_course['duration_in_minutes'],
                'status' => LearningPath::PUBLISH,
                'user_id' => $current_user_id,
                'level_id' => $level_id,
                'type_id' => $type_id,
                'price_id' => 1,
                'deleted_at' => null,
                'modality_id' => 1,
                'language_id' => $language_id,
                'program_id' => $program_id
            ]);

            /**
             * Get the learning path image
             */

            // get the image url
            $imageUrl = $ms_course['social_image_url'];

            // manage exception
            // $headers = get_headers($imageUrl);


                // Cast the contents of a file to a string and prevent errors
                $contents = @file_get_contents($imageUrl);

                if($contents != FALSE)
                {
                    // Subtracts the current image name from the string
                    $imageName = substr($imageUrl, strrpos($imageUrl, '/') + 1);

                    // Download image direct from url and storage in disk
                    $image = Storage::put('paths/'.$imageName, $contents);

                    // Match the image with the current learning path
                    $paths->image()->create([
                        'url' => 'paths/'.$imageName
                    ]);
                }


            foreach($ms_course['modules'] as $module_uid)
            {
                $moduleID = $module_uid;

                foreach($microsoft_courses['modules'] as $module)
                {

                    switch($module['locale'] ){
                        case ('en-en'):
                            $language_id = 1;
                            break;
                        case ('es-es'):
                            $language_id = 2;
                            break;
                        default:
                    }

                    // level of module
                    switch($module['levels'][0]){
                        case('beginner'):
                            $module_level_id = 1;
                            break;
                        case('intermediate'):
                            $module_level_id = 2;
                            break;
                        case('advanced'):
                            $module_level_id = 3;
                            break;
                        default:
                            $module_level_id = 1;
                    }

                    if($module['uid'] == $moduleID)
                    {
                        $record = Module::where('uid', '=', $module['uid'])->first();

                        if($record === null )
                        {
                            $modules = Module::create([
                                'uid' => $module['uid'],
                                'title' => $module['title'],
                                'subtitle' => null,
                                'summary' => $module['summary'],
                                'url' => $module['url'],
                                'duration_in_minutes' => $module['duration_in_minutes'],
                                'status' => Module::PUBLISH,
                                'slug' => Str::slug($module['title']),
                                'user_id' => $current_user_id,
                                'level_id' => $module_level_id,
                                'topic_id' => 7, // Ingeniería de Software
                                'price_id' => 1, // Free
                                'type_id' => 2, // module
                                'modality_id' => 1, // E-learning
                                'language_id' => $language_id,
                                'program_id' => 2, // Microsoft
                                // 'order' => null,
                                // 'learning_path_id' => $paths->id,
                            ]);

                            $paths->modules()->attach($modules->id);
                        }

                        /**
                         * Get the module image
                         */

                        // get the image url
                        $moduleImageUrl = $module['social_image_url'];

                        // manage exception

                            // Cast the contents of a file to a string and prevent errors
                            $contents = @file_get_contents($moduleImageUrl);

                            if($contents != FALSE)
                            {
                                // Subtracts the current image name from the string
                                $imageName = substr($moduleImageUrl, strrpos($moduleImageUrl, '/') + 1);

                                // Download image direct from url and storage in disk
                                $image = Storage::put('paths/modules/'.$imageName, $contents);

                                // Match the image with the current learning path
                                $modules->image()->create([
                                    'url' => 'paths/modules/'.$imageName
                                ]);
                            }


                        /**
                         * (OPTIONAL) Recomended use MicrosoftUnitSeeder
                         */
                        // foreach($module['units'] as $unit_uid)
                        // {
                        //     $unitID = $unit_uid;

                        //     foreach($microsoft_courses['units'] as $unit)
                        //     {
                        //         if ($unit['uid'] == $unitID) {

                        //             $unitRecord = Unit::where('uid', '=', $unit['uid'])->first();

                        //             if($unitRecord === null)
                        //             {
                        //                 $units = Unit::create([
                        //                     'uid' => $unit['uid'],
                        //                     'title' => $unit['title'],
                        //                     'slug' => Str::slug($unit['title']),
                        //                     'summary' => null,
                        //                     'order' => null,
                        //                     'url' => null,
                        //                     'iframe' => null,
                        //                     'duration_in_minutes' => $unit['duration_in_minutes'],
                        //                     'module_id' => $modules->id,
                        //                     'platform_id' => 1,
                        //                     'type_id' => 3,
                        //                 ]);
                        //             }
                        //         }
                        //     }
                        // }
                    }
                }
            }


            /*
            $modules = Http::get('https://docs.microsoft.com/api/hierarchy/paths/'. $uid );

            foreach ($modules['modules'] as $module ){
                $module_inserted = DB::table('modules')->insertGetId([
                    'title' => $module['achievement']['title'],
                    'slug' => Str::slug($module['achievement']['title']),
                    'summary' => $module['achievement']['summary'],
                    'order' => null,
                    'duration_in_minutes' => $module['achievement']['duration_in_minutes'],
                    'url' => $module['achievement']['url'],
                    'learning_path_id' => $paths->id,
                    'type_id' => 2,
                ]);


                $iten_id = $module['units'];

               $units = Http::get('https://docs.microsoft.com/api/hierarchy/modules?unitId='. $iten_id . '&locale=' . $locale);

                foreach( $module['units'] as $unit ){
                    $unit_inserted = DB::table('units')->insertGetId([
                        'title' => $unit['title'],
                        'slug' => Str::slug($unit['title']),
                        'order' => null,
                        'url' => 'https://docs.microsoft.com/es-es' . $unit['url'],
                        'iframe' => null,
                        'duration_in_minutes' => $unit['duration_in_minutes'],
                        'module_id'=> $module_inserted,
                        'platform_id' => $platform_id,
                        'type_id' => 3
                    ]);

                }

            }
            */


        }
    }
}
