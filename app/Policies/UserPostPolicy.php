<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        return $user->id == $post->publisher_id;
    }

    public function destroy(User $user, Post $post)
    {
        return $user->id == $post->publisher_id;
    }
}
