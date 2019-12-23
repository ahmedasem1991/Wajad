<?php

namespace App\Policies;

use App\User;
use App\PostRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostRequestPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any post requests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the post request.
     *
     * @param  \App\User  $user
     * @param  \App\PostRequest  $postRequest
     * @return mixed
     */
    public function view(User $user, PostRequest $postRequest)
    {
        return true;
    }

    /**
     * Determine whether the user can create post requests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the post request.
     *
     * @param  \App\User  $user
     * @param  \App\PostRequest  $postRequest
     * @return mixed
     */
    public function update(User $user, PostRequest $postRequest)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the post request.
     *
     * @param  \App\User  $user
     * @param  \App\PostRequest  $postRequest
     * @return mixed
     */
    public function delete(User $user, PostRequest $postRequest)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the post request.
     *
     * @param  \App\User  $user
     * @param  \App\PostRequest  $postRequest
     * @return mixed
     */
    public function restore(User $user, PostRequest $postRequest)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the post request.
     *
     * @param  \App\User  $user
     * @param  \App\PostRequest  $postRequest
     * @return mixed
     */
    public function forceDelete(User $user, PostRequest $postRequest)
    {
        return true;
    }
}
