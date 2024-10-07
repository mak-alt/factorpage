<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $tenant_id
 * @property string $name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property MenuItem[] $menuItems
 * @property Tenant $tenant
 */
class Menu extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tenant_id', 'name', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
