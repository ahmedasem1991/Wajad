<?php

namespace App\Policies;

use App\Answer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any answers.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the answer.
     *
     * @return mixed
     */
    public function view(User $user, Answer $answer)
    {
        return true;
    }

    /**
     * Determine whether the user can create answers.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the answer.
     *
     * @return mixed
     */
    public function update(User $user, Answer $answer)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the answer.
     *
     * @return mixed
     */
    public function delete(User $user, Answer $answer)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the answer.
     *
     * @return mixed
     */
    public function restore(User $user, Answer $answer)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the answer.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Answer $answer)
    {
        return false;
    }
}
