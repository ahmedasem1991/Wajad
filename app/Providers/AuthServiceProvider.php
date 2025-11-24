<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Pktharindu\NovaPermissions\Traits\ValidatesPermissions;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;

    protected $policies = [
       // 'App\Activity' => 'App\Policies\ActivityPolicy',
        \App\Post::class => \App\Policies\PostPolicy::class,
        \App\Brand::class => \App\Policies\BrandPolicy::class,
        \App\Qrcode::class => \App\Policies\QrcodePolicy::class,
        \App\GenerateQrcode::class => \App\Policies\GenerateQrcodePolicy::class,
        \App\AssignQrcode::class => \App\Policies\AssignQrcodePolicy::class,
        \App\User::class => \App\Policies\UserPolicy::class,
        \App\Item::class => \App\Policies\ItemPolicy::class,
        \App\Package::class => \App\Policies\PackagePolicy::class,
        \App\Subscription::class => \App\Policies\SubscriptionPolicy::class,
        'App\Subcategory' => \App\Policies\SubcategoryPolicy::class,
       // 'App\Item' => 'App\Policies\UserItemPolicy',
       \App\Answer::class => \App\Policies\AnswerPolicy::class,
       \App\PostRequest::class => \App\Policies\PostRequestPolicy::class,
       \App\Role::class => \App\Policies\RolePolicy::class,
       \App\Keyword::class => \App\Policies\KeywordPolicy::class,
       \App\Setting::class => \App\Policies\SettingsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        foreach (config('novapermissionsAdmin.permissions') as $key => $permissions) {
            Gate::define($key, function (User $user) use ($key) {
                if ($this->nobodyHasAccess($key)) {
                    return true;
                }

                return $user->hasPermissionTo($key);
            });
        }
    }
}
