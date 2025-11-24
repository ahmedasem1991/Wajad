<?php

namespace App\Policies;

use App\Exceptions\Api\ApiException;
use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Laravel\Nova\Nova;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('view posts')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the post.
     *
     * @return mixed
     */
    public function view(User $user, Post $post)
    {

        // if (Auth()->User()->isCorporateAdmin()) {
        if ($user->hasPermissionTo('view posts')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  true;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @return mixed
     */
    public function create(User $user)
    {

        // if(\Request::url() == \URL::to('/') .Nova::path() . '/resources/closed-posts' ||\Request::url() == \URL::to('/') .Nova::path() . '/resources/hiden-posts')
        // {
        //     return false;
        // }
        // if (Auth()->User()->isCorporateAdmin()) {
        if ($user->hasPermissionTo('create posts')) {
            return true;
        } else {
            return false;
        }
        // }

        // return  true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @return mixed
     */
    public function update(User $user, Post $post)
    {

        if ($user->isUser()) {
            if ($user->id == $post->publisher_id) {
                return true;
            }
            throw new ApiException(trans('auth.not_authorized'), 400);
        }

        // if (Auth()->User()->isCorporateAdmin()) {
        if ($user->hasPermissionTo('edit posts')) {
            return true;
        } else {
            return false;
        }
        // }

        // return  true;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {

        // if (Auth()->User()->isCorporateAdmin()) {
        if ($user->hasPermissionTo('delete posts')) {
            return true;
        } else {
            return false;
        }
        // }
        // return  false;
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        return Auth()->User()->isAdmin() ? false : true;
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        return Auth()->User()->isAdmin() ? false : true;
    }

    public function destroy(User $user, Post $post)
    {
        if ($user->isUser()) {
            if ($user->id == $post->publisher_id) {
                return true;
            }
            throw new ApiException(trans('auth.not_authorized'), 400);
        }

    }
}
