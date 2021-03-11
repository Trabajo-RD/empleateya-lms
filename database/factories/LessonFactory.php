<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://channel9.msdn.com/Series/Beginners-Series-to-JavaScript/Beginning-the-Beginners-series-1-of-51',
            'iframe' => '<iframe src="https://channel9.msdn.com/Series/Beginners-Series-to-JavaScript/Beginning-the-Beginners-series-1-of-51/player" width="960" height="540" allowFullScreen frameBorder="0" title="Beginning the Beginner\'s series [1 of 51] - Microsoft Channel 9 Video"></iframe>',
            'platform_id' => 2
        ];
    }
}
