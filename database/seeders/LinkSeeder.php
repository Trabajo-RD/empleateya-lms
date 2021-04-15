<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Link;
use App\Models\LinkCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_name = 'Redes Sociales';

        $category_id = DB::table('link_categories')->insertGetId([
            'name' => $category_name,
            'slug' => Str::slug($category_name)
        ]);

        Link::create([
            'name' => 'Facebook',
            'url' => 'https://www.facebook.com/MTrabajoRD',
            'description' => null,
            'target' => '_blank',
            'relationship' => null,
            'metadata' => [
                'class' => '',
                'icon' => 'fab fa-facebook-f',
                'image' => '',
                'color' => '',
                'width' => '',
                'height' => '',
                'rss' => '',
                'order' => '3',
                'before_link' => '',
                'between_link' => '',
                'after_link' => '',
                'rating' => ''
            ],
            'link_category_id' => $category_id
        ]);

        Link::create([
            'name' => 'Instagram',
            'url' => 'https://www.instagram.com/mtrabajord/',
            'description' => null,
            'target' => '_blank',
            'relationship' => null,
            'metadata' => [
                'class' => '',
                'icon' => 'fab fa-instagram',
                'image' => '',
                'color' => '',
                'width' => '',
                'height' => '',
                'rss' => '',
                'order' => '1',
                'before_link' => '',
                'between_link' => '',
                'after_link' => '',
                'rating' => ''
            ],
            'link_category_id' => $category_id
        ]);

        Link::create([
            'name' => 'Twitter',
            'url' => 'https://twitter.com/MTrabajoRD',
            'description' => null,
            'target' => '_blank',
            'relationship' => null,
            'metadata' => [
                'class' => '',
                'icon' => 'fab fa-twitter',
                'image' => '',
                'color' => '',
                'width' => '',
                'height' => '',
                'rss' => '',
                'order' => '2',
                'before_link' => '',
                'between_link' => '',
                'after_link' => '',
                'rating' => ''
            ],
            'link_category_id' => $category_id
        ]);

        Link::create([
            'name' => 'YouTube',
            'url' => 'https://www.youtube.com/channel/UCvQVfiyRPCxmWMrmH5QYqdg',
            'description' => null,
            'target' => '_blank',
            'relationship' => null,
            'metadata' => [
                'class' => '',
                'icon' => 'fab fa-youtube',
                'image' => '',
                'color' => '',
                'width' => '',
                'height' => '',
                'rss' => '',
                'order' => '4',
                'before_link' => '',
                'between_link' => '',
                'after_link' => '',
                'rating' => ''
            ],
            'link_category_id' => $category_id
        ]);
    }
}
