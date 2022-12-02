<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Module;
use Illuminate\Auth\Access\HandlesAuthorization;

use Illuminate\Auth\Access\Response;

class ModulePolicy
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

    public function moduleEnrolled(User $user, Module $module)
    {
        return $module->users->contains( $user->id );
    }

    /**
     * Check that the status of the path is equal to published
     *
     * @param User $user
     * @param Module $module
     * @return void
     */
    public function published(?User $user, Module $module) {
        if ($module->status == 3) {
            return true;
        } else {
            return false;
        }
    }
}
