<?php

namespace App\Policies;

use App\PostRequest;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostRequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any post requests.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the post request.
     *
     * @return mixed
     */
    public function view(User $user, PostRequest $postRequest)
    {
        return true;
    }

    /**
     * Determine whether the user can create post requests.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the post request.
     *
     * @return mixed
     */
    public function update(User $user, PostRequest $postRequest)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the post request.
     *
     * @return mixed
     */
    public function delete(User $user, PostRequest $postRequest)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the post request.
     *
     * @return mixed
     */
    public function restore(User $user, PostRequest $postRequest)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the post request.
     *
     * @return mixed
     */
    public function forceDelete(User $user, PostRequest $postRequest)
    {
        return true;
    }
}
