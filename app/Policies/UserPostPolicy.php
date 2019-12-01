<?php

namespace App\Policies;

use App\Post;
use App\User;
use App\Exceptions\Api\ApiException;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        if ($user->id == $post->publisher_id) {
            return true;
        }
        throw new ApiException(trans('auth.not_authorized'), 400);
    }

    public function destroy(User $user, Post $post)
    {
        if ($user->id == $post->publisher_id) {
            return true;
        }
        throw new ApiException(trans('auth.not_authorized'), 400);
    }
}
