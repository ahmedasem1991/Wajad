<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
// use Pktharindu\NovaPermissions\Permission;
use Pktharindu\NovaPermissions\Policies\Policy;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
        'permissions',
        'corporate_id',
        'limitation_of_posts',
        'default_group',
        'auto_approve',
        'mobile_group',
        'posts_period',
        'free_qrcodes',
        'available_period_qrcodes',
    ];

    /**
     * The attributes which should be extended to the model.
     *
     * @var array
     */
    protected $appends = [
        'permissions',
    ];

    /**
     * Cast attributes to their correct types.
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * Get all users which are assigned a specific role.
     *
     * @return Illuminate\Support\Collection
     */
    public function users()
    {
        return $this->belongsToMany(config('novapermissions.userModel', \App\User::class));
    }

    /**
     * Returns all Permissions for this Role.
     *
     * @return Illuminate\Support\Collection
     */
    public function getPermissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function corporate()
    {
        return $this->belongsTo(Corporate::class, 'corporate_id');
    }

    /**
     * Replace all existing permissions with a new set of permissions.
     */
    public function setPermissions(array $permissions)
    {
        if (! $this->id) {
            $this->save();
        }

        $this->revokeAll();

        collect($permissions)->map(function ($permission) {
            $this->grant($permission);
        });
    }

    /**
     * Check if a user has a given permission.
     *
     * @param  string  $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->getPermissions->contains('permission_slug', $permission);
    }

    /**
     * Give Permission to a Role.
     *
     * @param  string  $permission
     * @return bool
     */
    public function grant($permission)
    {
        if ($this->hasPermission($permission)) {
            return true;
        }

        if (! array_key_exists($permission, Gate::abilities())) {
            abort(403, 'Unknown permission');
        }

        return Permission::create([
            'role_id' => $this->id,
            'permission_slug' => $permission,
        ]);

        return false;
    }

    /**
     * Revokes a Permission from a Role.
     *
     * @param  string  $permission
     * @return bool
     */
    public function revoke($permission)
    {
        if (\is_string($permission)) {
            return Permission::findOrFail($permission)->delete();
        }

        return false;
    }

    /**
     * Remove all permissions from this Role.
     */
    public function revokeAll()
    {
        return $this->getPermissions()->delete();
    }

    /**
     * Get a list of permissions.
     *
     * @return array
     */
    public function getPermissionsAttribute()
    {
        return Permission::where('role_id', $this->id)->get()->pluck('permission_slug')->toArray();
    }

    /**
     * Replace all existing permissions with a new set of permissions.
     */
    public function setPermissionsAttribute(array $permissions)
    {
        if (! $this->id) {
            $this->save();
        }

        $this->revokeAll();

        collect($permissions)->map(function ($permission) {
            if (! \in_array($permission, Policy::all(), true)) {
                return;
            }

            $this->grant($permission);
        });
    }
}
