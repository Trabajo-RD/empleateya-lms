<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Comment;
use App\Models\Workshop;
use App\Models\Attitude;
use App\Models\Ability;
use App\Models\Image;
use App\Models\Activity;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workshops = Workshop::factory(50)->create();

        $faker = Faker::create();

        foreach($workshops as $workshop){

            Review::factory(5)->create([
                'reviewable_id' => $workshop->id,
                'reviewable_type' => Workshop::class
            ]);

            Comment::factory(5)->create([
                'commentable_id' => $workshop->id,
                'commentable_type' => Workshop::class
            ]);

            Attitude::factory()->create([
                'workshop_id' => $workshop->id
            ]);

            Ability::factory()->create([
                'workshop_id' => $workshop->id
            ]);



            // factory(Image::class, 1)->create([

            // ]);

            // Image::create([
            //     'url' => 'workshops/' . $faker->image('public/storage/workshops', 640, 480, null, false),
            //     'imageable_id' => $workshop->id,
            //     'imageable_type' => Workshop::class
            // ]);

            // $workshop->tags()->attach([
            //     rand(1,10),
            //     rand(11,20)
            // ]);

            $activities = Activity::factory(4)->create();



            foreach($activities as $activity){

                // $workshop->activities()->attach($workshop->id);

                Task::factory(4)->create([
                    'activity_id' => $activity->id
                ]);
            }
        }
    }
}
