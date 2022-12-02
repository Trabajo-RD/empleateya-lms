<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LearningPath;
use Illuminate\Auth\Access\HandlesAuthorization;

class LearningPathPolicy
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

    public function learningPathEnrolled(User $user, LearningPath $path) {
        return $path->users->contains($user->id);
    }

    /**
     * Check that the status of the path status is equal to published
     *
     * @param User $user
     * @param LearningPath $path
     * @return void
     */
    public function published(?User $user, LearningPath $path) {
        if ($path->status == 3) {
            return true;
        } else {
            return false;
        }
    }

    public function completeLearningPath(User $user, LearningPath $path) {
        return false;
    }
}
