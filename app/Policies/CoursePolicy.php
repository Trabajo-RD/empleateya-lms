<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use App\Models\Review;

use Illuminate\Auth\Access\Response;
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
     * Determine if the given user can create course
     * 
     * @param   \App\Models\User      $user
     * @return  bool
     */
    // TODO: Create policy tu Course Create method
    public function create( User $user )
    {
        // return $user->role == 'Creator'; 
        return $user->can('create-course');
    }

    /**
     * Determine if the given course can be updated by the user.
     * 
     * @param \App\Models\User      $user
     * @param \App\Models\Course    $course
     * @return \Illuminate\Auth\Access\Response
     */
    public function update( User $user, Course $course )
    {
        return $user->id === $course->user_id || $user->id === $course->contributor_id
                    ? Response::allow()
                    : Response::deny('No puedes actualizar la información de este curso.');
    }

    /**
     * Check if the given user is enrolled in the course
     * 
     * @param \App\Models\User      $user
     * @param \App\Models\Course    $course
     * @return \Illuminate\Auth\Access\Response
     */
    public function enrolled( User $user, Course $course )
    {
        return $course->students->contains( $user->id )
                ? Response::allow()
                : Response::deny('No estas inscrito en este curso.');
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
