<?php

namespace App\Policies;

use App\Keyword;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KeywordPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Keyword $keyword)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Keyword $keyword)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Keyword $keyword)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Keyword $keyword)
    {
        return false;
    }

    public function destroy(User $user, Keyword $keyword)
    {
        return false;
    }
}
