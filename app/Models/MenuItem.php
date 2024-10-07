<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $menu_id
 * @property string $tenant_id
 * @property string $name
 * @property string $link
 * @property boolean $target
 * @property integer $sort
 * @property string $created_at
 * @property string $updated_at
 * @property Menu $menu
 * @property Tenant $tenant
 */
class MenuItem extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['menu_id', 'parent_id', 'name', 'link', 'target', 'sort', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class);
    }
}
