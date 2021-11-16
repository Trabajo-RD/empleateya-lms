<?php

namespace Database\Seeders;

use App\Models\Audience;
use Illuminate\Database\Seeder;

use App\Models\Course;
use App\Models\Image;
use App\Models\Requirement;
use App\Models\Goal;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Description;
use App\Models\Review;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $courses = Course::factory(100)->create();

        foreach($courses as $course){

            Review::factory(5)->create([
                'course_id' => $course->id
            ]);

            Image::factory(1)->create([
                'imageable_id' => $course->id,
                'imageable_type' => Course::class
            ]);

            $course->tags()->attach([
                rand(1, 10),
                rand(11, 20),
            ]);

            Requirement::factory()->create([
                'course_id' => $course->id
            ]);

            Goal::factory()->create([
                'course_id' => $course->id
            ]);

            Audience::factory()->create([
                'course_id' => $course->id
            ]);

            $sections =  Section::factory(4)->create(['course_id' => $course->id]);

            foreach($sections as $section){
                $lessons = Lesson::factory(4)->create(['section_id' => $section->id]);

                foreach($lessons as $lesson){
                    Description::factory(1)->create(['lesson_id' => $lesson->id]);
                }
            }
        }
    }
}
