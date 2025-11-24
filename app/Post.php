<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\Api\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as MasterModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Post extends MasterModel
{
    use HasFactory;

    use LogsActivity, ResponseTrait, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'publisher_id',
        'item_id',
        'status',
        'losted_at',
        'founded_at',
        'owner_id',
        'founder_id',
        'latitude',
        'longitude',
        'approval_status',
        'sub_category_id',
        'model_id',
        'color_id',
        'post_type_id',
        'appearance_status',
        'brand_id',
        'city_id',
        'images',
        'reward',
        'question_1',
        'question_2',
        'question_3',
        'show_name',
        'region_id',
        'show_number',
    ];

    protected static $logAttributes = [
        'title',
        'description',
        'publisher.name',
        'item.title',
        'status',
        'losted_at',
        'founded_at',
        'owner.name',
        'founder.name',
        'latitude',
        'longitude',
        'approval_status',
        'sub_category.name_en',
        'model.name_en',
        'color.name_en',
        'post_type.title',
        'appearance_status',
        'brand.name_en',
        'city.name_en',
        'images',
        'reward',
        'region_id',
        'question_1',
        'question_2',
        'question_3',
        'show_name',
        'show_number',
    ];

    protected static $logOnlyDirty = true;

    protected $casts = [
        'losted_at' => 'datetime',
        'founded_at' => 'datetime',
        'end_date' => 'datetime',
        'images' => 'array',
    ];

    const APPROVALSTATUS = [
        0 => 'pending',
        1 => 'approved',
        2 => 'rejected',
        'pending' => 0,
        'approved' => 1,
        'rejected' => 2,
    ];

    const PUBLISHER_TYPE = [
        1 => 'user',
        2 => 'corporate',
        3 => 'admin',
        'user' => 1,
        'corporate' => 2,
        'admin' => 3,
    ];

    const Status = [
        0 => 'lost',
        1 => 'found',
        'lost' => 0,
        'found' => 1,
    ];

    const APPEARANCESTATUS = [
        0 => 'hidden',
        1 => 'show',
        'hidden' => 0,
        'show' => 1,
    ];

    const OPENSTATUS = [
        0 => 'closed',
        1 => 'open',
        'closed' => 0,
        'open' => 1,
    ];

    public function visits()
    {
        return $this->morphOne(Visit::class, 'visitable');
    }

    /**
     * Define The Relation Of The Item with Post
     */
    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }

    /**
     * Define The User was Published The Post with Post
     */
    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id')->withTrashed();
    }

    /**
     * Define The Founder Of The Item "In Case Of Found Item"
     */
    public function founder()
    {
        return $this->belongsTo(User::class, 'founder_id')->withTrashed();
    }

    /**
     * Define The Owner Of The Item "In Case Of Lost Item"
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id')->withTrashed();
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id')->withTrashed();
    }

    /**
     * Define The Owner Of The Item "In Case Of Lost Item"
     */
    public function postType()
    {
        return $this->belongsTo(PostType::class, 'post_type_id');
    }

    /**
     * Define The corporate Of The Post
     */
    public function corporate()
    {
        return $this->belongsTo(Corporate::class)->withTrashed();
    }

    public function ownerPerson()
    {
        return $this->belongsTo(People::class, 'owner_person_id')->withTrashed();
    }

    public function founderPerson()
    {
        return $this->belongsTo(People::class, 'founder_person_id')->withTrashed();
    }

    /**
     * Define The Category Of The Post
     */
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id')->withTrashed();
    }

    /**
     * Define The Brand Of The Post
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withTrashed()->withTrashed();
    }

    /**
     * Define The Model Of The Post
     */
    public function model()
    {
        return $this->belongsTo(Model::class, 'model_id')->withTrashed()->withTrashed();
    }

    /**
     * Define The Color Of The Post
     */
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id')->withTrashed()->withTrashed();
    }

    /**
     * Post Reports
     */
    public function reports()
    {
        return $this->hasMany(PostReport::class);
    }

    /**
     * Define The Item  Of Post
     */
    public function scopeItem($query, $item_id)
    {
        return $query->where('item_id', $item_id);
    }

    /**
     * Define The Publisher  Of Post
     */
    public function scopePublisher($query, $publisher_id)
    {
        return $query->where('publisher_id', $publisher_id);
    }

    /**
     * Define The Owner  Of Item
     */
    public function scopeOwner($query, $owner_id)
    {
        return $query->where('owner_id', $owner_id);
    }

    /**
     * Define The Founder  Of Item
     */
    public function scopeFounder($query, $founder_id)
    {
        return $query->where('founder_id', $founder_id);
    }

    public function isLost()
    {
        return $this->status == self::Status['lost'];
    }

    public function isFound()
    {
        return $this->status == self::Status['found'];
    }

    public function scopeModel($query, $model_id)
    {
        return $query->where('model_id', $model_id);
    }

    public function scopeColor($query, $color_id)
    {
        return $query->where('color_id', $color_id);
    }

    public function scopeSubcategory($query, $sub_category_id)
    {
        return $query->where('sub_category_id', $sub_category_id);
    }

    /**
     * Define The Status Of Post
     * 0 is lost
     * 1 is found
     */
    public function scopeStatus($query, $status)
    {
        $status = ($status == 'lost') ? 0 : 1;

        return $query->where('status', $status);
    }

    public function scopeIsOpen($query)
    {
        return $query->where('open_status', true);
    }

    public function scopeIsClosed($query)
    {
        return $query->where('open_status', false);
    }

    public function scopeAppearance($query)
    {
        return $query->where('appearance_status', true);
    }

    public function scopeIsShow($query, $status = 1)
    {
        return $query->where('appearance_status', true);
    }

    public function scopeIsHidden($query)
    {
        return $query->where('appearance_status', false);
    }

    public function scopeIsPending($query)
    {
        return $query->where('approval_status', 0);
    }

    public function scopeIsApproved($query)
    {
        return $query->where('approval_status', 1);
    }

    public function scopeIsRejected($query)
    {
        return $query->where('approval_status', 2);
    }

    public function scopeIsReported($query)
    {
        return $query->where('reports_number', '!=', 0);
    }

    public function scopeLost($query)
    {
        return $query->where('status', 0);
    }

    public function scopeFound($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Define The post type Of Post
     * 0 is lost
     * 1 is found
     */
    public function scopePostType($query, $post_type_id)
    {
        return $query->where('post_type_id', $post_type_id);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'post_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function postRequests()
    {
        return $this->hasMany(PostRequest::class, 'post_id');
    }

    public function getPublisherTypeAttribute($value)
    {
        if ($value == 1) {
            return 'user';
        }
        if ($value == 2) {
            return 'corporate';
        }
        if ($value == 3) {
            return 'admin';
        }
    }

    public function ended()
    {
        return ($this->end_date < Carbon::now()) ? true : false;
    }

    // public function getOwnerReleatedToSystemAttribute($value)
    // {
    //     if($value==1)
    //     return 'Yes';
    //     if($value==0)
    //     return 'No';

    // }
    // public function getFounderReleatedToSystemAttribute($value)
    // {
    //     if($value==1)
    //     return 'Yes';
    //     if($value==0)
    //     return 'No';

    // }

    public function deleteQuestions()
    {
        return $this->questions()->delete();
        // return parent::delete();
    }
}
