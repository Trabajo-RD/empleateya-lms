<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workshop;
use Illuminate\Auth\Access\HandlesAuthorization;
use Carbon\Carbon;

class WorkshopPolicy
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
     * Return true if user is enrolled in workshop
     */
    public function workshopEnrolled(User $user, Workshop $workshop)
    {
        // return all registered users in the course
        return $workshop->users->contains($user->id);
    }

    /**
     * Check that the status of the workshop status is equal to published
     *
     * @param User $user
     * @param Workshop $workshop
     * @return void
     */
    public function published(?User $user, Workshop $workshop) {
        if ($workshop->status == 3) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Return true if the workshop has already been started
     */
    public function workshopStarted(?User $user, Workshop $workshop)
    {
        if ($workshop->start_date > Carbon::now()) {
            return true;
        } else {
            return false;
        }
    }

    public function completeWorkshop(User $user, Workshop $workshop){
        return false;
    }
}
