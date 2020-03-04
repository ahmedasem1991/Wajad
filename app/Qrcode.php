<?php

namespace App;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\Api\ResponseTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qrcode extends Model
{
    use LogsActivity, SoftDeletes;

    protected $fillable = ['unique_reference_number', 'generate_reference_number', 'assign_reference_number', 'type', 'status', 'quantity', 'qrcode_url', 'image', 'available_period', 'start_at', 'end_at', 'user_id', 'corporate_id', 'corporate_assign_reference_number', 'item_id'];


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

    public function scopeType($query, $type)
    {
        return $query->where('type', self::Types[$type]);
    }
    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
    public function scopeItem($query, $item_id)
    {
        return $query->where('item_id', $item_id);
    }


    const STATUS = [
        1 => 'In Stock',
        2 => 'Assigned To User',
        3 => 'Assigned To Corporate',
        4 => 'Registered',
        5 => 'Re-Registered',
        6 => 'Expired',
        'In Stock' => 1,
        'Assigned To User' => 2,
        'Assigned To Corporate' => 3,
        'Registered' => 4,
        'Re-Registered' => 5,
        'Expired' => 6,
    ];
    public function statusTitle($status)
    {
        return $this->status = self::STATUS[$status];
    }
    public function scopeStatus($query, $status)
    {
        return $query->where('status', self::STATUS[$status]);
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
    public function scopeSingleAssign($query)
    {
        return $query->where('type', 1);
    }
    public function scopeMultiAssign($query)
    {
        return $query->where('type', 2);
    }
    public function scopeInStock($query)
    {
        return $query->where('status', 1);
    }
    public function scopeRegistered($query)
    {
        return $query->where('status', 4);
    }
    public function scopeReRegistered($query)
    {
        return $query->where('status', 5);
    }
    public function scopeExpired($query)
    {
        return $query->where('status', 6);
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
    public function scopeAvailableToUser($query)
    {
        return $query->where('status', 2);
    }
}
