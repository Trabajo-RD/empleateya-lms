<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Level;
use App\Models\Category;
use App\Models\Price;
use App\Models\Type;
use App\Models\Modality;
use App\Models\Topic;
use App\Models\Language;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();

        return [
            'uid' => 'capacitate.'.Str::slug($title),
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'summary' => $this->faker->paragraph(),
            'url' => 'https://docs.microsoft.com/es-mx/learn/paths/az-900-describe-cloud-concepts/',
            'duration_in_minutes' => 60,
            'status' => $this->faker->randomElement([1, 2, 3, 4]),
            'slug' => Str::slug($title),
            'user_id' => $this->faker->randomElement([6, 7, 8, 9, 10, 11, 12]),
            //'user_id' => User::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'price_id' => Price::all()->random()->id,
            'type_id' => 4,
            'modality_id' => Modality::all()->random()->id,
            'language_id' => Language::all()->random()->id,
            'topic_id' => Topic::all()->random()->id,
            'audience' => $this->faker->randomElement([5, 10, 15, 20]),
            'start_date' => null,
            'end_date' => null,
            'program_id' => 1 // RD-Trabaja
        ];
    }
}
