<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $tenant_id
 * @property integer $template_id
 * @property string $key
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 * @property Template $template
 * @property Tenant $tenant
 */
class TenantTemplatePreference extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tenant_id', 'template_id', 'key', 'value', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
