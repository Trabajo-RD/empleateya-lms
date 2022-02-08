<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /***
         * route
         * width
         * height
         * Deprecated: args image_category, set null!
         * bool: true ? "public/storage/cursos/imagen.jpg" : "imagen.jpg"
         */

        return [
            'url' => 'courses/' . $this->faker->image('public/storage/courses', 640, 480, null, false),
            'imageable_id' => null,
            'imageable_type' => null
        ];
    }

}
