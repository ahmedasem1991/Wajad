<?php

namespace App\Observers;

use App\User;
use App\AssignQrcode;
use App\Jobs\DeleteUserChat;
use App\Jobs\PrepereNewUser;
use Illuminate\Support\Facades\Auth;

class UserObserver
{


    public function creating(User $User) {
        if($User->type==1)
    {
      $check=  User::withTrashed()->where('email',$User->email)->where('type',User::Types['user'])->first();
      if( $check)
      throw \Illuminate\Validation\ValidationException::withMessages([ 'email' => ['This email already exit , please restore this user or force delete it'], ]);
    }
 
      $check=  User::withTrashed()->where('email',$User->email)->where('type',$User->type)->first();
      if($check)
      throw \Illuminate\Validation\ValidationException::withMessages([ 'email' => ['This email already exit , please restore this user or force delete it'], ]);
    
         
    }
    public function saving(User $User)
    {
        if ($User->mobile_number != '' || $User->mobile_number != null){
            $User->mobile_number =   ltrim($User->mobile_number,0);
        }
       // $User->mobile_number=   str_replace(' ', '',$User->mobile_number);
        if (Auth::check() && Auth()->User()->isCorporateAdmin()) {

            $User->corporate_id = Auth()->User()->corporate_id;
        }


    }


    public function saved(User $User)
    {


        if( ! Auth::guard('api')->check()  && $User->type==1) {

            if(count($User->qrcodes) == 0 ){


            AssignQrcode::create([
                'assign_to'=>1,
                'type'=>1,
                'user_id'=>$User->id,
                'quantity'=>defaultGroup()->free_qrcodes ,
                'available_period'=>defaultGroup()->available_period_qrcodes ,
                'created_from'=>'new_register' ,
               ]);
            }
               if( $User->quick_user_id ==NULL)
               PrepereNewUser::dispatch($User);

        }


    }
    public function updating(User $User)
    {
       // $User->mobile_number=   str_replace(' ', '',$User->mobile_number);
    }
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        // logger('user deletd');
        // if($user->isUser())
        // DeleteUserChat::dispatch($user);
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {

        // logger('user soft deletd');
        // if($user->isUser())
        // DeleteUserChat::dispatch($user);
       
    }
}
