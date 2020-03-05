<?php

namespace App;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\Api\ResponseTrait;
use App\Services\Checkers\Checkers;
use App\Services\Filters\Constants\QrcodeConstants;
use App\Services\Filters\Contracts\FilterContract;
use App\Services\Filters\Filters;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qrcode extends Model implements QrcodeConstants
{
    use LogsActivity, SoftDeletes, Filters, Checkers;

    protected $fillable = [
        'unique_reference_number',
        'generate_reference_number',
        'assign_reference_number',
        'type',
        'status',
        'quantity',
        'qrcode_url',
        'image',
        'available_period',
        'start_at',
        'item_id',
        'end_at',
        'user_id',
        'corporate_id',
        'corporate_assign_reference_number'
    ];

    const Types = [
        1 => 'Single Assign',
        2 => 'Multi Assign',
        'Single Assign' => 1,
        'Multi Assign' => 2
    ];

    public function typeTitle($type)
    {
        return $this->type === self::Types[$type];
    }

    public function productPackagePivot()
    {
        return $this->belongsTo(PackageProductManagement::class, 'package_product_pivot_id');
    }

    public function getQrcodeUrlAttribute($value)
    {
        return route('api.scan-qrcode-api', $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function qrcodegenerate()
    {
        return $this->belongsTo(GenerateQrcode::class, 'generate_reference_number', 'generate_reference_number');
    }

    public function assignqrcode()
    {
        return $this->belongsTo(AssignQrcode::class, 'assign_reference_number', 'assign_reference_number');
    }

    public function package_product_pivot()
    {
        return $this->belongsTo(PackageProductManagement::class, 'package_product_pivot_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }


    public function registerQrcode(Request $request)
    {
        try {
            $status = 3;
            $QRCode = $this->find($request->qrcode_id);
            $QRCode->status == 3 ? $status = 4 : $status = 5;
            $QRCode->update([
                'item_id' => $request->item_id,
                'status' => $status
            ]);
            $this->addResponse(trans('messages.successfully_registered'))->addStatusCode(201);
            Log::INFO($this->response());
            return $this->response();
        } catch (Exception $e) {
            $this->addResponse($e->getMessage)->addStatusCode(409);
            Log::ERROR($this->response());
            return $this->response();
        }
    }

    public function updateQrcodeToexpired()
    {
        return $this->update([
            'status' => 6
        ]);
    }

    public function reassignQrcodeToItem($item_id)
    {
        return $this->update([
            'item_id' => $item_id,
            'status' => 5,
        ]);
    }

    public function assignQrcodeToItem($item_id)
    {
        return $this->update([
            'item_id' => $item_id,
            'status' => 4,
            'start_at' => Carbon::now()->toDateTimeString(),
            'end_at' => Carbon::now()->addDays($this->available_period),
        ]);
    }

    public function isQrcodeMulitAssign()
    {
        return $this->type == 2;
    }

    public function isQrcodeRegistered()
    {
        return $this->status == 4;
    }
    public function isQrcodeExpired()
    {
        return Carbon::now()->toDateTimeString() > $this->end_at;
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 6);
    }
}
