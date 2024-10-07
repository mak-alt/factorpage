<?php

namespace App\Services;

use App\Models\CaseStudy;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class TenantPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        // Get the current tenant
        $tenantId = currentTenantId();

        if ($media->model_type == "App\Models\CaseStudy") {
            return $tenantId.'/case-studies/' . $media->id . '/';
        }

        // Return the storage path based on the tenant ID
        return $tenantId.'/';
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . '/conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . '/responsive/';
    }
}