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
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'summary' => $this->faker->paragraph(),
            'url' => 'https://docs.microsoft.com/es-mx/learn/paths/az-900-describe-cloud-concepts/',
            'duration_in_minutes' => 60,
            'status' => $this->faker->randomElement([Course::DRAFT, Course::PENDING, Course::PUBLISH, Course::TRASH]),
            'slug' => Str::slug($title),
            'user_id' => 1,
            //'user_id' => User::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id' => Price::all()->random()->id,
            'type_id' => Type::all()->random()->id,
            'modality_id' => Modality::all()->random()->id,
        ];
    }
}
