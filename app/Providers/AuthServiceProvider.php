<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Pktharindu\NovaPermissions\Traits\ValidatesPermissions;

class AuthServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;

    protected $policies = [
        // 'App\Activity' => 'App\Policies\ActivityPolicy',
        'App\Post' => 'App\Policies\PostPolicy',
        'App\Brand' => 'App\Policies\BrandPolicy',
        'App\Qrcode' => 'App\Policies\QrcodePolicy',
        'App\GenerateQrcode' => 'App\Policies\GenerateQrcodePolicy',
        'App\AssignQrcode' => 'App\Policies\AssignQrcodePolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Item' => 'App\Policies\ItemPolicy',
        'App\Package' => 'App\Policies\PackagePolicy',
        'App\Subscription' => 'App\Policies\SubscriptionPolicy',
        'App\Subcategory' => 'App\Policies\SubcategoryPolicy',
        // 'App\Item' => 'App\Policies\UserItemPolicy',
        'App\Answer' => 'App\Policies\AnswerPolicy',
        'App\PostRequest' => 'App\Policies\PostRequestPolicy',
        'App\Role' => 'App\Policies\RolePolicy',
        'App\Keyword' => 'App\Policies\KeywordPolicy',
        'App\Setting' => 'App\Policies\SettingsPolicy',
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
