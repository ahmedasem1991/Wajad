<?php

namespace App\Providers;

use App\AdminNotification;
use App\Post;
use App\Role;
use App\User;
use App\People;
use App\Qrcode;
use App\Permission;
use App\PostRequest;
use App\AssignQrcode;
use App\Subscription;
use App\QrcodeRequest;
use App\GenerateQrcode;
use App\CorporateAssignQrcode;
use App\Jobs\GenerateQrcodeJob;
use App\Observers\PostObserver;
use App\Observers\RoleObserver;
use App\Observers\NotificationObserver;
use App\Observers\UserObserver;
use App\Observers\PeopleObserver;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use App\Observers\PostRequestObserver;
use Illuminate\Support\Facades\Schema;
use App\Observers\QrcodeAssignObserver;
use App\Observers\SubscriptionObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\QrcodeRequestObserver;
use App\Observers\QrcodeGenerateObserver;
use App\Observers\CorporateQrcodeAssignObserver;

class LaravelLoggerProxy {
    public function log( $msg ) {
        Log::info($msg);
    }
}
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::enableForeignKeyConstraints();
       // Schema::defaultStringLength(191);
        $pusher = $this->app->make('pusher');
        $pusher->set_logger( new LaravelLoggerProxy() );

        Subscription::observe(SubscriptionObserver::class);
        QrcodeRequest::observe(QrcodeRequestObserver::class);
        GenerateQrcode::observe(QrcodeGenerateObserver::class);
        AssignQrcode::observe(QrcodeAssignObserver::class);
        CorporateAssignQrcode::observe(CorporateQrcodeAssignObserver::class);
        Post::observe(PostObserver::class);
        People::observe(PeopleObserver::class);
        User::observe(UserObserver::class);
        PostRequest::observe(PostRequestObserver::class);
        AdminNotification::observe(NotificationObserver::class);
        \App\Role::observe(RoleObserver::class);


        // $Text='';
        // $Permissions=Permission::all()->pluck('name');
        // foreach($Permissions as $Permission){
        //     $display_name=Permission::where('name',$Permission)->first()['display_name'];
        //     $description=Permission::where('name',$Permission)->first()['description'];
        //     $group=Permission::where('name',$Permission)->first()['group'];
        //   $Text.= "'". $Permission ."'=>[
        //         'display_name' =>'".$display_name."',
        //         'description=>'".$description."',
        //         'group=>'".$group."',
        //   ],";
        // }
        // if (!session()->has('Permission')) {
        //     session(['Permission' => $Text]);
        //     logger($Text);
        // }



        // Queue::after(function (GenerateQrcodeJob $event) {
        // $event->generateQrcode->status='finished';
        // $event->generateQrcode->update();
        // logger('test');
        // });
    }
}
