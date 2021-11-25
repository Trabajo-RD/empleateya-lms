<?php

return [
    /**
     * Default Monitors users (Ministerio de Trabajo, Empleo Users)
     *
     * These settings must be set to the project .env file
     */



        /*
        |--------------------------------------------------------------------------
        | Default Monitors
        |--------------------------------------------------------------------------
        |
        | role: Contributor
        | Contributor without edit permission can teach courses and grade students,
        | but cannot modify activities.
        |
        |
        */
        [
            'document_id'       => env('MONITOR1_DOCUMENT_ID'),
            'document_type'     => env('MONITOR1_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR1_NAME'),
            'lastname'          => env('MONITOR1_LASTNAME'),
            'email'             => env('MONITOR1_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR1_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR1_TEAM_ID', 1),
            'password'          => env('MONITOR1_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR2_DOCUMENT_ID'),
            'document_type'     => env('MONITOR2_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR2_NAME'),
            'lastname'          => env('MONITOR2_LASTNAME'),
            'email'             => env('MONITOR2_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR2_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR2_TEAM_ID', 1),
            'password'          => env('MONITOR2_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR3_DOCUMENT_ID'),
            'document_type'     => env('MONITOR3_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR3_NAME'),
            'lastname'          => env('MONITOR3_LASTNAME'),
            'email'             => env('MONITOR3_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR3_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR3_TEAM_ID', 1),
            'password'          => env('MONITOR3_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR4_DOCUMENT_ID'),
            'document_type'     => env('MONITOR4_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR4_NAME'),
            'lastname'          => env('MONITOR4_LASTNAME'),
            'email'             => env('MONITOR4_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR4_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR4_TEAM_ID', 1),
            'password'          => env('MONITOR4_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR5_DOCUMENT_ID'),
            'document_type'     => env('MONITOR5_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR5_NAME'),
            'lastname'          => env('MONITOR5_LASTNAME'),
            'email'             => env('MONITOR5_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR5_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR5_TEAM_ID', 1),
            'password'          => env('MONITOR5_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR6_DOCUMENT_ID'),
            'document_type'     => env('MONITOR6_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR6_NAME'),
            'lastname'          => env('MONITOR6_LASTNAME'),
            'email'             => env('MONITOR6_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR6_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR6_TEAM_ID', 1),
            'password'          => env('MONITOR6_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR7_DOCUMENT_ID'),
            'document_type'     => env('MONITOR7_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR7_NAME'),
            'lastname'          => env('MONITOR7_LASTNAME'),
            'email'             => env('MONITOR7_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR7_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR7_TEAM_ID', 1),
            'password'          => env('MONITOR7_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR8_DOCUMENT_ID'),
            'document_type'     => env('MONITOR8_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR8_NAME'),
            'lastname'          => env('MONITOR8_LASTNAME'),
            'email'             => env('MONITOR8_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR8_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR8_TEAM_ID', 1),
            'password'          => env('MONITOR8_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR9_DOCUMENT_ID'),
            'document_type'     => env('MONITOR9_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR9_NAME'),
            'lastname'          => env('MONITOR9_LASTNAME'),
            'email'             => env('MONITOR9_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR9_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR9_TEAM_ID', 1),
            'password'          => env('MONITOR9_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR10_DOCUMENT_ID'),
            'document_type'     => env('MONITOR10_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR10_NAME'),
            'lastname'          => env('MONITOR10_LASTNAME'),
            'email'             => env('MONITOR10_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR10_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR10_TEAM_ID', 1),
            'password'          => env('MONITOR10_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR11_DOCUMENT_ID'),
            'document_type'     => env('MONITOR11_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR11_NAME'),
            'lastname'          => env('MONITOR11_LASTNAME'),
            'email'             => env('MONITOR11_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR11_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR11_TEAM_ID', 1),
            'password'          => env('MONITOR11_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR12_DOCUMENT_ID'),
            'document_type'     => env('MONITOR12_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR12_NAME'),
            'lastname'          => env('MONITOR12_LASTNAME'),
            'email'             => env('MONITOR12_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR12_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR12_TEAM_ID', 1),
            'password'          => env('MONITOR12_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        [
            'document_id'       => env('MONITOR13_DOCUMENT_ID'),
            'document_type'     => env('MONITOR13_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR13_NAME'),
            'lastname'          => env('MONITOR13_LASTNAME'),
            'email'             => env('MONITOR13_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR13_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR13_TEAM_ID', 1),
            'password'          => env('MONITOR13_PASSWORD'),
            'role'              => 'coursecreator',
        ],

];
