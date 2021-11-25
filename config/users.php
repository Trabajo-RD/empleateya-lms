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
            'role'              => 'administrator',
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
            'role'              => 'manager',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Course Moderator
        |--------------------------------------------------------------------------
        |
        | role: coursemoderator
        | Course moderators can moderate courses
        |
        |
        */
        [
            'document_id'       => env('COURSEMODERATOR_DOCUMENT_ID'),
            'document_type'     => env('COURSEMODERATOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('COURSEMODERATOR_NAME'),
            'lastname'          => env('COURSEMODERATOR_LASTNAME'),
            'email'             => env('COURSEMODERATOR_EMAIL'),
            'options'           => [
                'language'      => env('COURSEMODERATOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('COURSEMODERATOR_TEAM_ID', 1),
            'password'          => env('COURSEMODERATOR_PASSWORD'),
            'role'              => 'coursemoderator',
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
            'document_id'       => env('COURSECREATOR_DOCUMENT_ID'),
            'document_type'     => env('COURSECREATOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('COURSECREATOR_NAME'),
            'lastname'          => env('COURSECREATOR_LASTNAME'),
            'email'             => env('COURSECREATOR_EMAIL'),
            'options'           => [
                'language'      => env('COURSECREATOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('COURSECREATOR_TEAM_ID', 1),
            'password'          => env('COURSECREATOR_PASSWORD'),
            'role'              => 'coursecreator',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Content Moderator
        |--------------------------------------------------------------------------
        |
        | role: contentmoderator
        | Course moderators can moderate courses
        |
        |
        */
        [
            'document_id'       => env('CONTENTMODERATOR_DOCUMENT_ID'),
            'document_type'     => env('CONTENTMODERATOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('CONTENTMODERATOR_NAME'),
            'lastname'          => env('CONTENTMODERATOR_LASTNAME'),
            'email'             => env('CONTENTMODERATOR_EMAIL'),
            'options'           => [
                'language'      => env('CONTENTMODERATOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('CONTENTMODERATOR_TEAM_ID', 1),
            'password'          => env('CONTENTMODERATOR_PASSWORD'),
            'role'              => 'contentmoderator',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Content Creator
        |--------------------------------------------------------------------------
        |
        | role: contentcreator
        | Course creators can create new courses
        |
        |
        */
        [
            'document_id'       => env('CONTENTCREATOR_DOCUMENT_ID'),
            'document_type'     => env('CONTENTCREATOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('CONTENTCREATOR_NAME'),
            'lastname'          => env('CONTENTCREATOR_LASTNAME'),
            'email'             => env('CONTENTCREATOR_EMAIL'),
            'options'           => [
                'language'      => env('CONTENTCREATOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('CONTENTCREATOR_TEAM_ID', 1),
            'password'          => env('CONTENTCREATOR_PASSWORD'),
            'role'              => 'contentcreator',
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
            'document_id'       => env('INTERNALINSTRUCTOR_DOCUMENT_ID'),
            'document_type'     => env('INTERNALINSTRUCTOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('INTERNALINSTRUCTOR_NAME'),
            'lastname'          => env('INTERNALINSTRUCTOR_LASTNAME'),
            'email'             => env('INTERNALINSTRUCTOR_EMAIL'),
            'options'           => [
                'language'      => env('INTERNALINSTRUCTOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('INTERNALINSTRUCTOR_TEAM_ID', 1),
            'password'          => env('INTERNALINSTRUCTOR_PASSWORD'),
            'role'              => 'internalinstructor',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default External Instructor
        |--------------------------------------------------------------------------
        |
        | role: External Instructor
        | Instructor can do anything within a course, including changing the
        | activities and grading students
        |
        */
        [
            'document_id'       => env('EXTERNALINSTRUCTOR_DOCUMENT_ID'),
            'document_type'     => env('EXTERNALINSTRUCTOR_DOCUMENT_TYPE', 'CED'),
            'name'              => env('EXTERNALINSTRUCTOR_NAME'),
            'lastname'          => env('EXTERNALINSTRUCTOR_LASTNAME'),
            'email'             => env('EXTERNALINSTRUCTOR_EMAIL'),
            'options'           => [
                'language'      => env('EXTERNALINSTRUCTOR_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('EXTERNALINSTRUCTOR_TEAM_ID', 1),
            'password'          => env('EXTERNALINSTRUCTOR_PASSWORD'),
            'role'              => 'externalinstructor',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Helper
        |--------------------------------------------------------------------------
        |
        | role: helper
        | Helper without edit permission can teach courses and grade students,
        | but cannot modify activities.
        |
        |
        */
        [
            'document_id'       => env('HELPER_DOCUMENT_ID'),
            'document_type'     => env('HELPER_DOCUMENT_TYPE', 'CED'),
            'name'              => env('HELPER_NAME'),
            'lastname'          => env('HELPER_LASTNAME'),
            'email'             => env('HELPER_EMAIL'),
            'options'           => [
                'language'      => env('HELPER_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('HELPER_TEAM_ID', 1),
            'password'          => env('HELPER_PASSWORD'),
            'role'              => 'helper',
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
            'email'             => env('STUDENT_EMAIL'),
            'options'           => [
                'language'      => env('STUDENT_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('STUDENT_TEAM_ID', 1),
            'password'          => env('STUDENT_PASSWORD'),
            'role'              => 'student',
        ],

        /*
        |--------------------------------------------------------------------------
        | Default Guest
        |--------------------------------------------------------------------------
        |
        | role: guest
        | Guest without edit permission can teach courses and grade students,
        | but cannot modify activities.
        |
        |
        */
        [
            'document_id'       => env('GUEST_DOCUMENT_ID'),
            'document_type'     => env('GUEST_DOCUMENT_TYPE', 'CED'),
            'name'              => env('GUEST_NAME'),
            'lastname'          => env('GUEST_LASTNAME'),
            'email'             => env('GUEST_EMAIL'),
            'options'           => [
                'language'      => env('GUEST_LANGUAGE', 'es'),
            ],
            'current_team_id'   => env('GUEST_TEAM_ID', 1),
            'password'          => env('GUEST_PASSWORD'),
            'role'              => 'guest',
        ],



];
