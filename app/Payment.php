<?php

namespace App;

use App\Helpers\Api\ResponseTrait;
use Illuminate\Database\Eloquent\Model as MasterModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends MasterModel
{
    use LogsActivity, ResponseTrait,  SoftDeletes;

    protected $fillable = ['payment_gateway', 'corporate_id', 'user_id', 'result'];

    protected static $logAttributes = [
        'payment_gateway', 'corporate.name_en', 'user.name', 'result',
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
}
