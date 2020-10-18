<?php

namespace App;
use Illuminate\Http\Request;
use App\Helpers\Api\ResponseTrait;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as MasterModel;

class Payment extends MasterModel
{
    use SoftDeletes, LogsActivity,  ResponseTrait;

    protected $fillable = ['payment_gateway', 'corporate_id', 'user_id', 'result'];

    protected static $logAttributes = [
        'payment_gateway', 'corporate.name_en', 'user.name', 'result'
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
