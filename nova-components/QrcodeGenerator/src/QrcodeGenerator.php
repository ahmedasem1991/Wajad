<?php

namespace Smartappco\QrcodeGenerator;

use Laravel\Nova\Fields\Field;

class QrcodeGenerator extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'qrcode-generator';

    public function length($length)
    {
        return $this->withMeta([
            'length' => $length,
        ]);
    }

    public function showUrl($showUrl = false)
    {
        return $this->withMeta([
            'showUrl' => $showUrl,
        ]);
    }

    public function qrCodeRouteName($qrCodeRouteName)
    {
        return $this->withMeta([
            'qrCodeRouteName' => $qrCodeRouteName,
        ]);
    }
}
