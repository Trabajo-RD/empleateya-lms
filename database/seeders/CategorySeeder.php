<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Creatividad',
                'icon' => 'fas fa-pen-nib',
                'topics' => [
                    [
                        'name' => 'Diseño Gráfico e Ilustración',
                        'icon' => 'fas fa-pen-nib',
                        'tags' => [
                            [
                                'name' => 'Photoshop',
                                'icon' => 'far fa-image',
                            ],
                            [
                                'name' => 'Illustrator',
                                'icon' => 'fas fa-pen-nib',
                            ],
                            [
                                'name' => 'Diseño Gráfico',
                                'icon' => 'fas fa-pencil-ruler',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Diseño Web',
                        'icon' => 'fas fa-pen-nib',
                        'tags' => [
                            [
                                'name' => 'Photoshop',
                                'icon' => 'far fa-image',
                            ],
                            [
                                'name' => 'Adobe XD',
                                'icon' => 'fas fa-pen-nib',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Arquitectura',
                        'icon' => 'fas fa-pen-nib',
                        'tags' => [
                            [
                                'name' => 'AutoCAD',
                                'icon' => 'fas fa-drafting-compas',
                            ],
                            [
                                'name' => 'Blender',
                                'icon' => 'fab fa-unity',
                            ],
                        ],
                    ],
                    [
                        'name' => 'User Experience (UX)',
                        'icon' => 'fab fa-uikit',
                        'tags' => [
                            [
                                'name' => 'User Interface (UI)',
                                'icon' => 'fab fa-uikit',
                            ],
                            [
                                'name' => 'Figma',
                                'icon' => 'fab fa-figma',
                            ],
                            [
                                'name' => 'Adobe XD',
                                'icon' => 'fas fa-pen-nib',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Marketing',
                'icon' => 'fas fa-briefcase',
                'topics' => [
                    [
                        'name' => 'Marketing Digital',
                        'icon' => 'fas fa-briefcase',
                        'tags' => [
                            [
                                'name' => 'Google Ads',
                                'icon' => 'fab fa-google',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Relaciones Públicas',
                        'icon' => 'fas fa-briefcase',
                        'tags' => [
                            [
                                'name' => 'Podcasting',
                                'icon' => 'fas fa-podcast',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Social Media',
                        'icon' => 'fas fa-briefcase',
                        'tags' => [
                            [
                                'name' => 'Facebook Ads',
                                'icon' => 'fab fa-facebook-square',
                            ],
                            [
                                'name' => 'Instagram Marketing',
                                'icon' => 'fab fa-instagram',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Tecnología',
                'icon' => 'fas fa-laptop',
                'topics' => [
                    [
                        'name' => 'Desarrollo Web',
                        'icon' => 'fas fa-laptop',
                        'tags' => [
                            [
                                'name' => 'HTML5',
                                'icon' => 'fab fa-html5',
                            ],
                            [
                                'name' => 'CSS',
                                'icon' => 'fab fa-css3',
                            ],
                            [
                                'name' => 'CSS3',
                                'icon' => 'fab fa-css3',
                            ],
                            [
                                'name' => 'Javascript',
                                'icon' => 'fab fa-js',
                            ],
                            [
                                'name' => 'PHP',
                                'icon' => 'fab fa-php',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Desarrollo de Software',
                        'icon' => 'fas fa-laptop-code',
                        'tags' => [
                            [
                                'name' => 'C#',
                                'icon' => 'fas fa-code',
                            ],
                            [
                                'name' => 'Java',
                                'icon' => 'fas fa-code',
                            ],
                            [
                                'name' => 'Python',
                                'icon' => 'fas fa-code',
                            ],
                            [
                                'name' => 'MVC',
                                'icon' => 'fas fa-code',
                            ],
                            [
                                'name' => '.NET',
                                'icon' => 'fas fa-code',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ingeniería de Software',
                        'icon' => 'fas fa-laptop',
                        'tags' => [
                            [
                                'name' => 'Microservicios',
                                'icon' => 'fas fa-laptop',
                            ],
                            [
                                'name' => 'Estructura de Datos',
                                'icon' => 'fas fa-laptop',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Redes y Seguridad',
                        'icon' => 'fas fa-laptop',
                        'tags' => [
                            [
                                'name' => 'Ética Hacker',
                                'icon' => 'fas fa-shield-alt',
                            ],
                            [
                                'name' => 'Ciberseguridad',
                                'icon' => 'fas fa-shield-alt',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Desarrollo Mobile',
                        'icon' => 'fas fa-laptop',
                        'tags' => [
                            [
                                'name' => 'Android',
                                'icon' => 'fab fa-android',
                            ],
                            [
                                'name' => 'Flutter',
                                'icon' => 'fas fa-mobile-alt',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Sistema Operativo',
                        'icon' => 'fas fa-laptop',
                        'tags' => [
                            [
                                'name' => 'Linux',
                                'icon' => 'fas fa-microship',
                            ],
                            [
                                'name' => 'Windows Server',
                                'icon' => 'fas fa-microship',
                            ],
                            [
                                'name' => 'Active Directory',
                                'icon' => 'fas fa-microship',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        foreach($categories as $category){

            $data = [
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'icon' => $category['icon'],
            ];

            // Category::create([
            //     'name' => $data['name'],
            //     'slug' => $data['slug'],
            //     'slug' => $data['icon'],
            // ]);

            $category_id = DB::table('categories')->insertGetId([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'icon' => $data['icon'],
            ]);

            foreach($category['topics'] as $topic){
                $topic_id = DB::table('topics')->insertGetId([
                    'name' => $topic['name'],
                    'slug' => Str::slug($topic['name']),
                    'icon' => $topic['icon'],
                    'category_id' => $category_id,
                ]);

                foreach($topic['tags'] as $tag){
                    $tag_id = DB::table('tags')->insertGetId([
                        'name' => $tag['name'],
                        'slug' => Str::slug($tag['name']),
                        'icon' => $tag['icon'],
                        'topic_id' => $topic_id,
                    ]);
                }
            }

        }



        // Category::create([
        //     'name' => 'Creatividad',

        // ]);

        // Category::create([
        //     'name' => 'Negocios'
        // ]);

        // Category::create([
        //     'name' => 'Tecnología'
        // ]);
    }
}
