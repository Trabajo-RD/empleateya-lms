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
            'document_id'       => env('MONITOR_DOCUMENT_ID'),
            'document_type'     => env('MONITOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MONITOR_NAME'),
            'lastname'          => env('MONITOR_LASTNAME'),
            'gender'            => env('MONITOR_GENDER'),
            'email'             => env('MONITOR_EMAIL'),
            'options'           => [
                'language'      => env('MONITOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MONITOR_TEAM_ID', 1),
            'password'          => env('MONITOR_PASSWORD'),
            'role'              => 'instructor',
        ],

];
