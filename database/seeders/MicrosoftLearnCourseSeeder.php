<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use App\Models\Course;
use App\Models\Image;
use App\Models\Requirement;
use App\Models\Goal;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Description;
use App\Models\Audience;

class MicrosoftLearnCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $response = Http::get('https://docs.microsoft.com/api/contentbrowser/search?environment=prod&locale=es-es&facet=roles&facet=levels&facet=products&facet=resource_type&%24filter=((resource_type%20eq%20%27learning%20path%27))&%24orderBy=popularity%20desc%2Clast_modified%20desc%2Ctitle&%24top=30&showHidden=false');

        // Spicified the data format to use
        $microsoft_courses = $response->json();

        foreach( $microsoft_courses['results'] as $ms_course){

            $level_id = 0;
            $type_id = '';

            // level of course
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

            // resource_type
            switch($ms_course['resource_type']){
                case('learning path'):
                    $type_id = 1;
                    break;
                case('module'):
                    $type_id = 2;
                    break;
                default:
                    $type_id = 1;
            }

            $courses = Course::create([
                'title' => $ms_course['title'],
                'subtitle' => null,
                'summary' => $ms_course['summary'],
                'url' => 'https://docs.microsoft.com/es-es' . $ms_course['url'],
                'duration_in_minutes' => $ms_course['duration_in_minutes'],
                'status' => 1,
                'slug' => Str::slug($ms_course['title']),
                'user_id' => 4,
                'level_id' => $level_id,
                'category_id' => 3,
                'price_id' => 1,
                'type_id' => $type_id,
                'modality_id' => 1,
            ]);

            // foreach($courses as $course){
            //     Image::create([
            //         'imageable_id' => $course->id,
            //         'imageable_type' => 'App\Models\Course'
            //     ]);

            //     Requirement::create([
            //         'course_id' => $course->id
            //     ]);

            //     Goal::create([
            //         'course_id' => $course->id
            //     ]);

            //     Audience::create([
            //         'course_id' => $course->id
            //     ]);

            //     $sections =  Section::create(['course_id' => $course->id]);

            //     foreach($sections as $section){
            //         $lessons = Lesson::create(['section_id' => $section->id]);

            //         foreach($lessons as $lesson){
            //             Description::create(['lesson_id' => $lesson->id]);
            //         }
            //     }
            // }

        }



    }
}
