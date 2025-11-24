<?php

namespace App\Observers;

use ClassicO\NovaMediaLibrary\Core\Model;

class MediaLibraryObserver
{
    public function saving(Model $model)
    {
        if (auth()->user()->isCorporateAdmin()) {
            $model->corporate_id = auth()->user()->corporate->id;
        }
    }
}
