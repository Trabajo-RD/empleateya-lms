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
            'gender'            => env('ADMINISTRATOR_GENDER'),
            'email'             => env('ADMINISTRATOR_EMAIL'),
            'options'           => [
                'language'      => env('ADMINISTRATOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('ADMINISTRATOR_TEAM_ID', 1),
            'password'          => env('ADMINISTRATOR_PASSWORD'),
            'role'              => env('ADMINISTRATOR_ROLE'),
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Course Creator
        |--------------------------------------------------------------------------
        |
        | role: coursecreator
        | Course creators can create new courses
        |
        |
        */
        [
            'document_id'       => env('CREATOR_DOCUMENT_ID'),
            'document_type'     => env('CREATOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('CREATOR_NAME'),
            'lastname'          => env('CREATOR_LASTNAME'),
            'gender'            => env('CREATOR_GENDER'),
            'email'             => env('CREATOR_EMAIL'),
            'options'           => [
                'language'      => env('CREATOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('CREATOR_TEAM_ID', 1),
            'password'          => env('CREATOR_PASSWORD'),
            'role'              => env('CREATOR_ROLE'),
        ],


        /*
        |--------------------------------------------------------------------------
        | Default Internal Instructor
        |--------------------------------------------------------------------------
        |
        | role: Internal Instructor
        | Instructor can do anything within a course, including changing the
        | activities and grading students
        |
        */
        [
            'document_id'       => env('INSTRUCTOR_DOCUMENT_ID'),
            'document_type'     => env('INSTRUCTOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('INSTRUCTOR_NAME'),
            'lastname'          => env('INSTRUCTOR_LASTNAME'),
            'gender'            => env('INSTRUCTOR_GENDER'),
            'email'             => env('INSTRUCTOR_EMAIL'),
            'options'           => [
                'language'      => env('INSTRUCTOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('INSTRUCTOR_TEAM_ID', 1),
            'password'          => env('INSTRUCTOR_PASSWORD'),
            'role'              => env('INSTRUCTOR_ROLE'),
        ],


        /*
        |--------------------------------------------------------------------------
        | Default Student
        |--------------------------------------------------------------------------
        |
        | role: student
        | Student without edit permission can teach courses and grade students,
        | but cannot modify activities.
        |
        |
        */
        [
            'document_id'       => env('STUDENT_DOCUMENT_ID'),
            'document_type'     => env('STUDENT_DOCUMENT_TYPE', 'CED'),
            'name'              => env('STUDENT_NAME'),
            'lastname'          => env('STUDENT_LASTNAME'),
            'gender'            => env('STUDENT_GENDER'),
            'email'             => env('STUDENT_EMAIL'),
            'options'           => [
                'language'      => env('STUDENT_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('STUDENT_TEAM_ID', 1),
            'password'          => env('STUDENT_PASSWORD'),
            'role'              => env('STUDENT_ROLE'),
        ]


];
