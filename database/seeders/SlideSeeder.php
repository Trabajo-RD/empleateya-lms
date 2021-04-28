<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slide;
use Illuminate\Support\Str;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::create([
            'title' => 'Free courses',
            'slug' => Str::slug('Free courses'),
            'subtitle' => null,
            'content' => 'In our Learning Management System you will find courses and articles from different areas that will help you in your professional development',
            'status' => 2,
            'title_color' => null,
            'content_color' => null,
            'link' => null,
            'link_color' => null,
            'link_bg_color' => null,
        ]);

        Slide::create([
            'title' => 'Face-to-Face courses',
            'slug' => Str::slug('Face-to-Face courses'),
            'subtitle' => null,
            'content' => '
            Get information about our face-to-face courses',
            'status' => 2,
            'title_color' => null,
            'content_color' => null,
            'link' => null,
            'link_color' => null,
            'link_bg_color' => null,
        ]);


            // 'image' => 'images/home/slider/hero2.jpg',
            // 'image' => 'images/home/slider/hero4.jpg',

    }
}
