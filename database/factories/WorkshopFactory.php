<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Workshop;
use App\Models\Price;
use App\Models\Modality;
use App\Models\Language;

use Carbon\Carbon;
use Illuminate\Support\Str;

class WorkshopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Workshop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();
        // \Log::info( var_dump($this, ' -1 $attributes::'));
        $start_date = new Carbon('first day of this month');

        return [
            'uid' => 'capacitate.'.Str::slug($title),
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'summary' => $this->faker->paragraph(),
            'url' => 'https://docs.microsoft.com/es-mx/learn/paths/az-900-describe-cloud-concepts/',
            'duration_in_minutes' => 60,
            'status' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
            'slug' => Str::slug($title),
            'required_min_age' => 18,
            'required_max_age' => 45,
            'audience' => $this->faker->randomElement([5, 10, 15, 20]),
            'start_date' => $this->faker->randomElement([
                $start_date,
                $this->faker->date('Y-m-d')
            ]),
            'end_date' => $this->faker->date('Y-m-d'),
            'location' => $this->faker->sentence(),
            'include_certificate' => false,
            'user_id' => 3,
            'program_id' => 1,
            'price_id' => Price::all()->random()->id,
            'modality_id' => Modality::all()->random()->id,
            'language_id' => Language::all()->random()->id,
            'course_id' => null
        ];

    }
}
