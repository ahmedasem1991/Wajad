<?php

namespace App\Observers;

use App\Question;

class QuestionObserver
{
    /**
     * Handle the question "Saving" event.
     *
     * @return void
     */
    public function saving(Question $question)
    {
        if (Auth()->User()->isCorporateAdmin()) {
            $question->corporate_id = Auth()->User()->corporate_id;
        }
    }

    /**
     * Handle the question "created" event.
     *
     * @return void
     */
    public function created(Question $question)
    {
        //
    }

    /**
     * Handle the question "updated" event.
     *
     * @return void
     */
    public function updated(Question $question)
    {
        //
    }

    /**
     * Handle the question "deleted" event.
     *
     * @return void
     */
    public function deleted(Question $question)
    {
        //
    }

    /**
     * Handle the question "restored" event.
     *
     * @return void
     */
    public function restored(Question $question)
    {
        //
    }

    /**
     * Handle the question "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Question $question)
    {
        //
    }
}
