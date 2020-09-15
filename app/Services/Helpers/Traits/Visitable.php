<?php
namespace App\Services\Helpers\Traits;

use App\Visit;

trait Visitable
{
    public function bootVisitable($model): void
    {
        $class = get_class($model);
        $id = $model->id;
        $visits = Visit::firstOrNew(['visitable_type'=>$class,'visitable_id'=>$id]);
        $visits->visitable_type = $class;
        $visits->visitable_id = $id;
        $visits->visits++;
        $visits->save();
    }

}
