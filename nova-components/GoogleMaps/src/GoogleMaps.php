<?php

namespace Smartappco\GoogleMaps;

use Laravel\Nova\Card;

class GoogleMaps extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';
    public function markers($markers=null)
    {
        return $this->withMeta([
        'markers' => $markers
        ]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'google-maps';
    }
}
