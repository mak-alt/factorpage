<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property string $preview_url
 * @property string $status
 * @property boolean $is_featured
 * @property string $created_at
 * @property string $updated_at
 * @property TemplateDefaultOption[] $templateDefaultOptions
 */
class Template extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'img', 'preview_url', 'status', 'is_featured', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function defaultOptions()
    {
        return $this->hasMany(TemplateDefaultOption::class, 'template_id', 'id');
    }

    public function scopeActive()
    {
        return $this->where('status','active');
    }

    protected function getNameAttribute($value)
    {
        return ucwords($value);
    }
}
