<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Policy to verify enrolled users in a course
     */
    public function enrolled( User $user, Course $course ){
        return $course->students->contains( $user->id );
    }

    /**
     * Verify if course status = PUBLISH
     */
    public function published( ?User $user, Course $course ){
        if( $course->status == 3 ){
            return true;
        } else {
            return false;
        }
    }

    /**
     *Check if an instructor is modifying a course created by another instructor
     */
    public function dictated( User $user, Course $course){

        if($course->user_id == $user->id ){
            return true;
        } else {
            return false;
        }

    }
}
