<?php

namespace App\Main;

use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;

class TenantAwareUrlGenerator extends DefaultUrlGenerator
{
    public function getUrl(): string
    {
        $url = global_asset('storage/'.$this->getPathRelativeToRoot());

        $url = $this->versionUrl($url);

        return $url;
    }
}