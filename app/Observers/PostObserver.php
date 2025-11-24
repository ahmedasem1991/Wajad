<?php

namespace App\Observers;

use App\People;
use App\Post;
use App\Question;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @return void
     */
    public function saving(Post $Post)
    {

        if (Auth()->User()->isCorporateAdmin()) {
            // $Post->appearance_status = 1;
            // $Post->open_status = 1;
            // $Post->approval_status = 1;
            $Post->corporate_id = Auth()->User()->corporate_id;
            $Post->publisher_id = Auth()->User()->id;
            $Post->publisher_type = 2;
            $Post->end_date = $Post->end_date;
            if (! $Post->isDirty('appearance_status')) {
                $Post->appearance_status = 1;
            }
            if (! $Post->isDirty('open_status')) {
                $Post->open_status = 1;
            }
            if (! $Post->isDirty('approval_status')) {
                $Post->approval_status = 1;
            }
        }
        if (Auth()->check() && Auth()->User()->isAdmin()) {

            $publisher_id = ($Post->owner_id) ? $Post->owner_id : $Post->founder_id;
            if (! $publisher_id) {
                $publisher_id = Auth()->User()->id;
            }
            $Post->publisher_type = 3;
            $Post->publisher_id = $publisher_id;
            $Post->end_date = $Post->end_date;
            if (! $Post->isDirty('appearance_status')) {
                $Post->appearance_status = 1;
            }
            if (! $Post->isDirty('open_status')) {
                $Post->open_status = 1;
            }
            if (! $Post->isDirty('approval_status')) {
                $Post->approval_status = 1;
            }
        }

        if (Auth()->User()->isCorporateAdmin() || Auth()->User()->isAdmin()) {
            $person = new People;
            if ($Post->owner_name != '' || $Post->owner_name != null) {

                $person->name = $Post->owner_name;
                $person->email = $Post->owner_email;
                $person->mobile_number = $Post->owner_mobile_number;
                $person->address = $Post->owner_address;
                $person->save();
                $Post->owner_person_id = $person->id;

                unset($Post->owner_name);
                unset($Post->owner_email);
                unset($Post->owner_address);
                unset($Post->owner_mobile_number);

            } else {
                // return false;
                unset($Post->owner_name);
                unset($Post->owner_email);
                unset($Post->owner_address);
                unset($Post->owner_mobile_number);
            }

            if ($Post->founder_name != '' || $Post->founder_name != null) {

                $person->name = $Post->founder_name;
                $person->email = $Post->founder_email;
                $person->mobile_number = $Post->founder_mobile_number;
                $person->address = $Post->founder_address;
                $person->save();
                $Post->founder_person_id = $person->id;

                unset($Post->founder_name);
                unset($Post->founder_email);
                unset($Post->founder_address);
                unset($Post->founder_mobile_number);

            } else {
                // return false;
                unset($Post->owner_name);
                unset($Post->owner_email);
                unset($Post->owner_address);
                unset($Post->owner_mobile_number);
            }

        }

    }

    public function saved(Post $Post)
    {
        if (Auth()->User()->isCorporateAdmin() || Auth()->User()->isAdmin()) {

            $question = $Post->question_1;
            if ($question == '' || $question == null) {
                $question = null;
            } else {
                Question::firstOrCreate([
                    'corporate_id' => Auth()->User()->corporate_id,
                    'post_id' => $Post->id,
                    'question' => $question,
                ]);
            }

            $question = $Post->question_2;
            if ($question == '' || $question == null) {
                $question = null;
            } else {
                Question::firstOrCreate([
                    'corporate_id' => Auth()->User()->corporate_id,
                    'post_id' => $Post->id,
                    'question' => $question,
                ]);
            }

            $question = $Post->question_3;
            if ($question == '' || $question == null) {
                $question = null;
            } else {
                Question::firstOrCreate([
                    'corporate_id' => Auth()->User()->corporate_id,
                    'post_id' => $Post->id,
                    'question' => $question,
                ]);
            }

        }
    }

    /**
     * Handle the Post "updated" event.
     *
     * @return void
     */
    public function updated(Post $Post)
    {

        if (Auth()->User()->isCorporateAdmin() || Auth()->User()->isAdmin()) {

            // //this for update
            if ($Post->questions->count() > 0) {

                $question = $Post->question_1;
                if ($question == '' || $question == null) {
                    $get_question = $Post->questions->first();
                    if ($get_question) {
                        $get_question->delete();
                    }
                } else {
                    $question_1 = $Post->questions->first();
                    $question_1->update([

                        'question' => $question,
                    ]);
                }

                $question = $Post->question_2;
                if ($question == '' || $question == null) {
                    $get_question = $Post->questions->skip(1)->take(1)->first();
                    if ($get_question) {
                        $get_question->delete();
                    }
                } else {
                    $question_2 = $Post->questions->skip(1)->take(1)->first();
                    if ($question_2) {
                        $question_2->update([

                            'question' => $question,
                        ]);
                    }

                }

                $question = $Post->question_3;
                if ($question == '' || $question == null) {
                    $get_question = $Post->questions->skip(2)->take(1)->first();
                    if ($get_question) {
                        $get_question->delete();
                    }
                } else {
                    $question_3 = $Post->questions->skip(2)->take(1)->first();
                    if ($question_3) {
                        $question_3->update([

                            'question' => $question,
                        ]);
                    }

                }

            }
        }
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @return void
     */
    public function deleted(Post $Post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @return void
     */
    public function restored(Post $Post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Post $Post)
    {
        //
    }
}
