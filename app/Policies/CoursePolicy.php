<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use App\Models\Review;

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
     * Prevent an instructor/creator from being able to modify a course created by another
     */
    public function dictated( User $user, Course $course){

        if($course->user_id == $user->id || $course->moderator_id == $user->id || $course->contributor_id == $user->id ){
            return true;
        } else {
            return false;
        }

    }

    /**
     * Check if course status == 2 (Borrador)
     */
    public function revision( User $user, Course $course ){

        if( $course->status == 2 ){
            return true;
        } else {
            return false;
        }

    }

    /**
     * Check if user has single course review
     */
    public function valued( User $user, Course $course ){
        if( Review::where('user_id', $user->id)->where('course_id', $course->id)->count() ){
            return false;
        } else {
            return true;
        }
    }
}
