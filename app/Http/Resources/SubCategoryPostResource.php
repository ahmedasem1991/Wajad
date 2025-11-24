<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryPostResource extends JsonResource
{
    public function toArray($request)
    {
        $status = $request->status;

        return [
            'id' => $this->id,
            'subCategoryName' => $this->{'name_'.app()->getLocale()},
            'subCategoryIcon' => env('APP_URL').'/'.$this->image,
            'subCategoryPostsCount' => $this->{$status.'posts'}()->isShow()->isOpen()->isApproved()->count(),
        ];
    }
}
