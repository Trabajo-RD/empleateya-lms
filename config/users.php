<?php

return [
    /**
     * Default users configuration
     *
     * These settings must be set to the project .env file
     */


        /*
        |--------------------------------------------------------------------------
        | Default Administrator
        |--------------------------------------------------------------------------
        |
        | role: Administrator
        | Administrator has the full control of the system
        |
        |
        */
        [
            'document_id'       => env('ADMINISTRATOR_DOCUMENT_ID'),
            'document_type'     => env('ADMINISTRATOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('ADMINISTRATOR_NAME'),
            'lastname'          => env('ADMINISTRATOR_LASTNAME'),
            'email'             => env('ADMINISTRATOR_EMAIL'),
            'options'           => [
                'language'      => env('ADMINISTRATOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('ADMINISTRATOR_TEAM_ID', 1),
            'password'          => env('ADMINISTRATOR_PASSWORD'),
            'role'              => 'Administrator',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Manager
        |--------------------------------------------------------------------------
        |
        | role: Manager
        | Manager can access course and modify them. they usually do not
        | participate in courses
        |
        */
        [
            'document_id'       => env('MANAGER_DOCUMENT_ID'),
            'document_type'     => env('MANAGER_DOCUMENT_TYPE', 'CED'),
            'name'              => env('MANAGER_NAME'),
            'lastname'          => env('MANAGER_LASTNAME'),
            'email'             => env('MANAGER_EMAIL'),
            'options'           => [
                'language'      => env('MANAGER_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('MANAGER_TEAM_ID', 1),
            'password'          => env('MANAGER_PASSWORD'),
            'role'              => 'Manager',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Creator
        |--------------------------------------------------------------------------
        |
        | role: Creator
        | Course creators can create new courses
        |
        |
        */
        [
            'document_id'       => env('CREATOR_DOCUMENT_ID'),
            'document_type'     => env('CREATOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('CREATOR_NAME'),
            'lastname'          => env('CREATOR_LASTNAME'),
            'email'             => env('CREATOR_EMAIL'),
            'options'           => [
                'language'      => env('CREATOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('CREATOR_TEAM_ID', 1),
            'password'          => env('CREATOR_PASSWORD'),
            'role'              => 'Creator',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Instructor
        |--------------------------------------------------------------------------
        |
        | role: Instructor
        | Instructor can do anything within a course, including changing the
        | activities and grading students
        |
        */
        [
            'document_id'       => env('INSTRUCTOR_DOCUMENT_ID'),
            'document_type'     => env('INSTRUCTOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('INSTRUCTOR_NAME'),
            'lastname'          => env('INSTRUCTOR_LASTNAME'),
            'email'             => env('INSTRUCTOR_EMAIL'),
            'options'           => [
                'language'      => env('INSTRUCTOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('INSTRUCTOR_TEAM_ID', 1),
            'password'          => env('INSTRUCTOR_PASSWORD'),
            'role'              => 'Instructor',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Contributor
        |--------------------------------------------------------------------------
        |
        | role: Contributor
        | Contributor without edit permission can teach courses and grade students,
        | but cannot modify activities.
        |
        |
        */
        [
            'document_id'       => env('CONTRIBUTOR_DOCUMENT_ID'),
            'document_type'     => env('CONTRIBUTOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('CONTRIBUTOR_NAME'),
            'lastname'          => env('CONTRIBUTOR_LASTNAME'),
            'email'             => env('CONTRIBUTOR_EMAIL'),
            'options'           => [
                'language'      => env('CONTRIBUTOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('CONTRIBUTOR_TEAM_ID', 1),
            'password'          => env('CONTRIBUTOR_PASSWORD'),
            'role'              => 'Contributor',
        ],


];
