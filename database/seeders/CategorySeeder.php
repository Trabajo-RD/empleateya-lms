<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\RequestInterface;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client(['verify' => false ]);
        // GetCategoriasLaborales: https://webapi.mt.gob.do/api/listas/categorias-laborales

        // $response = Http::get('https://webapi.mt.gob.do/api/listas/categorias-laborales');

        // $response = $client->request('GET', 'https://webapi.mt.gob.do/api/listas/categorias-laborales');

        // $categories = $response->json();

        // $categories = [
        //     [
        //     "cdg"=> 42,
        //     "name"=> "Siderurgica"
        //     ],
        //     [
        //     "cdg"=> 43,
        //     "name"=> "Agropecuaria"
        //     ],
        //     [
        //     "cdg"=> 44,
        //     "name"=> "Alimenticia"
        //     ],
        //     [
        //     "cdg"=> 45,
        //     "name"=> "Arquitectura"
        //     ],
        //     [
        //     "cdg"=> 46,
        //     "name"=> "Artesanal"
        //     ],
        //     [
        //     "cdg"=> 47,
        //     "name"=> "Automotriz"
        //     ],
        //     [
        //     "cdg"=> 162,
        //     "name"=> "Banca /  Financiera"
        //     ],
        //     [
        //     "cdg"=> 163,
        //     "name"=> "Biotecnologia"
        //     ],
        //     [
        //     "cdg"=> 164,
        //     "name"=> "Comercio"
        //     ],
        //     [
        //     "cdg"=> 165,
        //     "name"=> "Construccion"
        //     ],
        //     [
        //     "cdg"=> 166,
        //     "name"=> "Consultoria"
        //     ],
        //     [
        //     "cdg"=> 167,
        //     "name"=> "Consumo Masivo"
        //     ],
        //     [
        //     "cdg"=> 168,
        //     "name"=> "Defensa"
        //     ],
        //     [
        //     "cdg"=> 169,
        //     "name"=> "Diseno"
        //     ],
        //     [
        //     "cdg"=> 170,
        //     "name"=> "Educación"
        //     ],
        //     [
        //     "cdg"=> 171,
        //     "name"=> "Energía"
        //     ],
        //     [
        //     "cdg"=> 172,
        //     "name"=> "Entretenimiento"
        //     ],
        //     [
        //     "cdg"=> 173,
        //     "name"=> "Farmaceutica"
        //     ],
        //     [
        //     "cdg"=> 174,
        //     "name"=> "Financiera"
        //     ],
        //     [
        //     "cdg"=> 175,
        //     "name"=> "Forestal"
        //     ],
        //     [
        //     "cdg"=> 176,
        //     "name"=> "Gastronomia"
        //     ],
        //     [
        //     "cdg"=> 177,
        //     "name"=> "Gobierno"
        //     ],
        //     [
        //     "cdg"=> 178,
        //     "name"=> "Holding"
        //     ],
        //     [
        //     "cdg"=> 179,
        //     "name"=> "Hotelería"
        //     ],
        //     [
        //     "cdg"=> 180,
        //     "name"=> "Imprenta"
        //     ],
        //     [
        //     "cdg"=> 181,
        //     "name"=> "Información e Investigación"
        //     ],
        //     [
        //     "cdg"=> 182,
        //     "name"=> "Informática / Tecnología"
        //     ],
        //     [
        //     "cdg"=> 183,
        //     "name"=> "Inmobiliaria"
        //     ],
        //     [
        //     "cdg"=> 184,
        //     "name"=> "Internet"
        //     ],
        //     [
        //     "cdg"=> 185,
        //     "name"=> "Jurídica"
        //     ],
        //     [
        //     "cdg"=> 186,
        //     "name"=> "Manufactura"
        //     ],
        //     [
        //     "cdg"=> 187,
        //     "name"=> "Medios"
        //     ],
        //     [
        //     "cdg"=> 188,
        //     "name"=> "Minería / Petróleo / Gas"
        //     ],
        //     [
        //     "cdg"=> 189,
        //     "name"=> "ONGs"
        //     ],
        //     [
        //     "cdg"=> 190,
        //     "name"=> "Otra"
        //     ],
        //     [
        //     "cdg"=> 191,
        //     "name"=> "Pesca"
        //     ],
        //     [
        //     "cdg"=> 192,
        //     "name"=> "Publicidad / Marketing"
        //     ],
        //     [
        //     "cdg"=> 193,
        //     "name"=> "Química"
        //     ],
        //     [
        //     "cdg"=> 194,
        //     "name"=> "Salud"
        //     ],
        //     [
        //     "cdg"=> 195,
        //     "name"=> "Seguros"
        //     ],
        //     [
        //     "cdg"=> 196,
        //     "name"=> "Servicios"
        //     ],
        //     [
        //     "cdg"=> 197,
        //     "name"=> "Supermercados"
        //     ],
        //     [
        //     "cdg"=> 198,
        //     "name"=> "Telecomunicaciones"
        //     ],
        //     [
        //     "cdg"=> 199,
        //     "name"=> "Textil"
        //     ],
        //     [
        //     "cdg"=> 200,
        //     "name"=> "Transporte"
        //     ],
        //     [
        //     "cdg"=> 201,
        //     "name"=> "Turismo"
        //     ],
        //     [
        //     "cdg"=> 202,
        //     "name"=> "Seguridad"
        //     ],
        //     [
        //     "cdg"=> 203,
        //     "name"=> "Legal"
        //     ],
        //     [
        //     "cdg"=> 430,
        //     "name"=> "Administrativa"
        //     ],
        //     [
        //     "cdg"=> 2163,
        //     "name"=> "Industria"
        //     ]
        //     ];


        $categories = json_decode(file_get_contents(storage_path() . "../../public/json/categories.json" ), true);


        $design_topics = [
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
        ];

        $technology_topics = [
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
                'icon' => 'fas fa-network-wired',
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
                'icon' => 'fas fa-mobile-alt',
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
                'name' => 'Sistemas Operativos',
                'icon' => 'fas fa-laptop',
                'tags' => [
                    [
                        'name' => 'Linux',
                        'icon' => 'fas fa-microchip',
                    ],
                    [
                        'name' => 'Windows Server',
                        'icon' => 'fas fa-microchip',
                    ],
                    [
                        'name' => 'Active Directory',
                        'icon' => 'fas fa-microchip',
                    ],
                ],
            ],
        ];

        $marketing_topics = [
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
        ];

        $desarrollo_profesional_topics = [
            [
                'name' => 'Búsqueda de empleo',
                'icon' => 'fas fa-briefcase',
                'tags' => [
                    [
                        'name' => 'Empleo',
                        'icon' => 'fas fa-briefcase'
                    ]
                ],
            ],
            [
                'name' => 'Emprendimiento',
                'icon' => 'fas fa-briefcase',
            ],
        ];

        $dcb_topics = [
            [
                'name' => 'Competencia en comunicación lingüística',
                'icon' => 'fas fa-briefcase',
            ],
            [
                'name' => 'Competencia matemática',
                'icon' => 'fas fa-briefcase',
            ],
            [
                'name' => 'Competencia en el conocimiento y la interacción con el mundo físico',
                'icon' => 'fas fa-briefcase',
            ],
            [
                'name' => 'Competencia social y ciudadana',
                'icon' => 'fas fa-briefcase',
            ],
            [
                'name' => 'Competencia cultural y artística',
                'icon' => 'fas fa-briefcase',
            ],
            [
                'name' => 'Competencia para aprender a aprender',
                'icon' => 'fas fa-briefcase',
            ],
            [
                'name' => 'Tratamiento de la información y competencia computacional',
                'icon' => 'fas fa-briefcase',
            ],
            [
                'name' => 'Autonomía e iniciativa personal',
                'icon' => 'fas fa-briefcase',
            ],
        ];

        // $categories = [
        //     [
        //         'name' => 'Creatividad',
        //         'icon' => 'fas fa-pen-nib',
        //         'description' => null,
        //         'topics' => [
        //             [
        //                 'name' => 'Diseño Gráfico e Ilustración',
        //                 'icon' => 'fas fa-pen-nib',
        //                 'tags' => [
        //                     [
        //                         'name' => 'Photoshop',
        //                         'icon' => 'far fa-image',
        //                     ],
        //                     [
        //                         'name' => 'Illustrator',
        //                         'icon' => 'fas fa-pen-nib',
        //                     ],
        //                     [
        //                         'name' => 'Diseño Gráfico',
        //                         'icon' => 'fas fa-pencil-ruler',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'Diseño Web',
        //                 'icon' => 'fas fa-pen-nib',
        //                 'tags' => [
        //                     [
        //                         'name' => 'Photoshop',
        //                         'icon' => 'far fa-image',
        //                     ],
        //                     [
        //                         'name' => 'Adobe XD',
        //                         'icon' => 'fas fa-pen-nib',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'Arquitectura',
        //                 'icon' => 'fas fa-pen-nib',
        //                 'tags' => [
        //                     [
        //                         'name' => 'AutoCAD',
        //                         'icon' => 'fas fa-drafting-compas',
        //                     ],
        //                     [
        //                         'name' => 'Blender',
        //                         'icon' => 'fab fa-unity',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'User Experience (UX)',
        //                 'icon' => 'fab fa-uikit',
        //                 'tags' => [
        //                     [
        //                         'name' => 'User Interface (UI)',
        //                         'icon' => 'fab fa-uikit',
        //                     ],
        //                     [
        //                         'name' => 'Figma',
        //                         'icon' => 'fab fa-figma',
        //                     ],
        //                     [
        //                         'name' => 'Adobe XD',
        //                         'icon' => 'fas fa-pen-nib',
        //                     ],
        //                 ],
        //             ],
        //         ],
        //     ],
        //     [
        //         'name' => 'Marketing',
        //         'icon' => 'fas fa-briefcase',
        //         'description' => null,
        //         'topics' => [
        //             [
        //                 'name' => 'Marketing Digital',
        //                 'icon' => 'fas fa-briefcase',
        //                 'tags' => [
        //                     [
        //                         'name' => 'Google Ads',
        //                         'icon' => 'fab fa-google',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'Relaciones Públicas',
        //                 'icon' => 'fas fa-briefcase',
        //                 'tags' => [
        //                     [
        //                         'name' => 'Podcasting',
        //                         'icon' => 'fas fa-podcast',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'Social Media',
        //                 'icon' => 'fas fa-briefcase',
        //                 'tags' => [
        //                     [
        //                         'name' => 'Facebook Ads',
        //                         'icon' => 'fab fa-facebook-square',
        //                     ],
        //                     [
        //                         'name' => 'Instagram Marketing',
        //                         'icon' => 'fab fa-instagram',
        //                     ],
        //                 ],
        //             ],
        //         ],
        //     ],
        //     [
        //         'name' => 'Tecnología',
        //         'icon' => 'fas fa-laptop',
        //         'description' => null,
        //         'topics' => [
        //             [
        //                 'name' => 'Desarrollo Web',
        //                 'icon' => 'fas fa-laptop',
        //                 'tags' => [
        //                     [
        //                         'name' => 'HTML5',
        //                         'icon' => 'fab fa-html5',
        //                     ],
        //                     [
        //                         'name' => 'CSS',
        //                         'icon' => 'fab fa-css3',
        //                     ],
        //                     [
        //                         'name' => 'CSS3',
        //                         'icon' => 'fab fa-css3',
        //                     ],
        //                     [
        //                         'name' => 'Javascript',
        //                         'icon' => 'fab fa-js',
        //                     ],
        //                     [
        //                         'name' => 'PHP',
        //                         'icon' => 'fab fa-php',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'Desarrollo de Software',
        //                 'icon' => 'fas fa-laptop-code',
        //                 'tags' => [
        //                     [
        //                         'name' => 'C#',
        //                         'icon' => 'fas fa-code',
        //                     ],
        //                     [
        //                         'name' => 'Java',
        //                         'icon' => 'fas fa-code',
        //                     ],
        //                     [
        //                         'name' => 'Python',
        //                         'icon' => 'fas fa-code',
        //                     ],
        //                     [
        //                         'name' => 'MVC',
        //                         'icon' => 'fas fa-code',
        //                     ],
        //                     [
        //                         'name' => '.NET',
        //                         'icon' => 'fas fa-code',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'Ingeniería de Software',
        //                 'icon' => 'fas fa-laptop',
        //                 'tags' => [
        //                     [
        //                         'name' => 'Microservicios',
        //                         'icon' => 'fas fa-laptop',
        //                     ],
        //                     [
        //                         'name' => 'Estructura de Datos',
        //                         'icon' => 'fas fa-laptop',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'Redes y Seguridad',
        //                 'icon' => 'fas fa-network-wired',
        //                 'tags' => [
        //                     [
        //                         'name' => 'Ética Hacker',
        //                         'icon' => 'fas fa-shield-alt',
        //                     ],
        //                     [
        //                         'name' => 'Ciberseguridad',
        //                         'icon' => 'fas fa-shield-alt',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'Desarrollo Mobile',
        //                 'icon' => 'fas fa-mobile-alt',
        //                 'tags' => [
        //                     [
        //                         'name' => 'Android',
        //                         'icon' => 'fab fa-android',
        //                     ],
        //                     [
        //                         'name' => 'Flutter',
        //                         'icon' => 'fas fa-mobile-alt',
        //                     ],
        //                 ],
        //             ],
        //             [
        //                 'name' => 'Sistemas Operativos',
        //                 'icon' => 'fas fa-laptop',
        //                 'tags' => [
        //                     [
        //                         'name' => 'Linux',
        //                         'icon' => 'fas fa-microchip',
        //                     ],
        //                     [
        //                         'name' => 'Windows Server',
        //                         'icon' => 'fas fa-microchip',
        //                     ],
        //                     [
        //                         'name' => 'Active Directory',
        //                         'icon' => 'fas fa-microchip',
        //                     ],
        //                 ],
        //             ],
        //         ],
        //     ],
        // ];

        foreach($categories['categories'] as $key => $category){

            // Category::create([
            //     'name' => $category['name'],
            //     'slug' => Str::slug($category['name']),
            //     'icon' => 'fas fa-tag',
            //     'description' => null
            // ]);

            $data = [
                'name' => str_replace('/', '-', $category['name']),
                'slug' => Str::slug($category['name']),
                'cdg' => $category['cdg'],
                'icon' => 'fas fa-tag',
                'description' => null
            ];

            // Category::create([
            //     'name' => $data['name'],
            //     'slug' => $data['slug'],
            //     'slug' => $data['icon'],
            // ]);

            $category_id = DB::table('categories')->insertGetId([
                'name'  => $data['name'],
                'slug'  => $data['slug'],
                'cdg'   => $data['cdg'],
                'icon'  => $data['icon'],
                'description' => $data['description']
            ]);

            /**
             * Insert the default design topics
             */
            if($category['name'] == "Diseno")
            {
                foreach($design_topics as $topic){

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

            /**
             * Insert the default marketing topics
             */
            if($category['name'] == "Publicidad / Marketing")
            {
                foreach($marketing_topics as $topic){

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

            /**
             * Insert the default technology topics
             */
            if($category['name'] == "Informática / Tecnología")
            {
                foreach($technology_topics as $topic){

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

            if($category['name'] == 'Desarrollo Profesional') {
                foreach ($desarrollo_profesional_topics as $des_profesional) {
                    $topic_id = DB::table('topics')->insert([
                        'name' => $des_profesional['name'],
                        'slug' => Str::slug($des_profesional['name']),
                        'icon' => $des_profesional['icon'],
                        'category_id' => $category_id,
                    ]);

                }
            }

            if($category['name'] == 'Desarrollo de Competencias Basicas') {
                foreach ($dcb_topics as $topic) {
                    $topic_id = DB::table('topics')->insert([
                        'name' => $topic['name'],
                        'slug' => Str::slug($topic['name']),
                        'icon' => $topic['icon'],
                        'category_id' => $category_id,
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
