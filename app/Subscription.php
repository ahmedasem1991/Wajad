<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;

    protected $table = 'package_user';

    protected $fillable = [
        'user_id', 'package_id', 'corporate_id', 'subscriber', 'created_from',
    ];

    protected static $logAttributes = [
        'user.name', 'package.name_en', 'corporate.name_en', 'subscriber',
    ];

    protected static $logOnlyDirty = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function corporate()
    {
        return $this->belongsTo(Corporate::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function assignqrcode()
    {
        return $this->belongsTo(AssignQrcode::class, 'assign_id');
    }

    public function qrcodes()
    {
        if ($this->assignqrcode) {
            return $this->assignqrcode->qrcodes();
        }

    }
}
