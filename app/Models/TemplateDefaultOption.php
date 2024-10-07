<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $template_id
 * @property string $key
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 * @property Template $template
 */
class TemplateDefaultOption extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['template_id', 'key', 'value', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id', 'id');
    }
}
