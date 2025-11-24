<?php

namespace App\NovaCorporate;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaPermissions extends Tool
{
    protected $roleResource = Role::class;

    private $customRole = false;

    /**
     * Perform any tasks that need to happen when the tool is booted.
     */
    public function boot()
    {
        Nova::script('NovaPermissions', __DIR__.'/../dist/js/tool.js');
        Nova::style('NovaPermissions', __DIR__.'/../dist/css/tool.css');

        if (! $this->customRole) {
            Nova::resources([
                $this->roleResource,
            ]);
        }
    }

    /**
     * @return mixed
     */
    public function roleResource(string $roleResource)
    {
        $this->customRole = true;

        $this->roleResource = $roleResource;

        return $this;
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
