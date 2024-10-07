<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property integer $id
 * @property string $tenant_id
 * @property string $name
 * @property string $slug
 * @property string $content
 * @property string $status
 * @property string $publish_date
 * @property integer $sorting_order
 * @property string $created_at
 * @property string $updated_at
 * @property Tenant $tenant
 */
class CaseStudy extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['tenant_id', 'name', 'slug', 'content', 'status', 'publish_date', 'sorting_order', 'meta_title', 'meta_description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function getPhotoAttribute()
    {
        $media = $this->getMedia('case-studies')->last();
        
        if ($media) {
            return $media->getUrl();
        }

        // Return a default placeholder URL
        return asset('images/case-study-placeholder.png');
    }

    public function getShortDescriptionAttribute()
    {
        // Strip HTML tags
        $plainTextContent = strip_tags($this->content);

        // Limit the character count to 150 characters
        return Str::limit($plainTextContent, 150);
    }
}
