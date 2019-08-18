<?php

namespace Smartappco\PackagesAndProducts;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class PackagesAndProducts extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('packages_and_products', __DIR__.'/../dist/js/tool.js');
        Nova::style('packages_and_products', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('packages_and_products::navigation');
    }
}
