<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class UserItemQrcodePivot extends Model
{
    protected $table="users_items_qrcodes_pivot";


    public function qrcodes()
    {
        return $this->belongsToMany(Qrcodes::class, 'qrcode_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsToMany(Item::class, 'item_id');
    }
}
