<?php
use App\Models\User;
use App\Models\Tenant;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\TemplateDefaultOption;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use App\Models\TenantTemplatePreference;

if(! function_exists('getTemplateImage')) {
    function getTemplateImage($template) 
    {
        return asset('templates/'.strtolower($template->name).'/assets/images/'.$template->img);
    }
}

// if (!function_exists('setCurrentTenantId')) {
//     /**
//      * Get the ID of the current tenant.
//      *
//      * @return int|null
//      */
//     function setCurrentTenantId($id = null)
//     {
//         if($id){
//             return session()->put('tenant_id', $id);
//         }

//         $tenant_id = Auth::user()->current_tenant_id;

//         return session()->put('tenant_id', $tenant_id);
        
//     }
// }


if (!function_exists('currentTenantId')) {
    /**
     * Get the ID of the current tenant.
     *
     * @return int|null
     */
    function currentTenantId()
    {
        if(tenant('id')) {
            return tenant('id');
        }
        return session()->get('tenant_id');
    }
}

if(!function_exists('getTemplateOption')) {
    function getTemplateOption($key) 
    {
        //check if tenant has set the required option
        $value = TenantTemplatePreference::where('tenant_id',currentTenantId())->where('key',$key)->first();

        if($value) {
            if($value->value != "") {
                return $value->value;
            }
        }

        //than get the default if not exists
        $value = TemplateDefaultOption::where('template_id',getSelectedTemplate()->id)->where('key',$key)->first();

        if($value) {
            if($value->value != "") {
                return $value->value;
            }
        }

        return null;
    }
}

if(!function_exists('getSelectedTemplate')) {
    function getSelectedTemplate() 
    {
        $template = Tenant::find(tenant('id'));

        if($template) {
            return $template->template()->first();
        }

        $template = Tenant::find(currentTenantId())->template()->first();

        return $template;
    }
}


if (!function_exists('createUniqueSlug')) {
    function createUniqueSlug($title, $slug, $model, $id = null)
    {
        $slug = $slug ?: Str::slug($title);

        $query = $model::where('tenant_id', currentTenantId())
            ->where(function ($query) use ($slug, $title) {
                $query->where('slug', $slug)
                      ->orWhere('slug', 'like', $title . '-%');
            });

        if ($id !== null) {
            $query->where('id', '!=', $id);
        }

        $count = $query->count();

        return $count > 0 ? "{$slug}-{$count}" : $slug;
    }
}

if (!function_exists('createUniqueTitle')) {
    function createUniqueTitle($title, $model, $id = null)
    {
        $tenantId = currentTenantId();
        $originalTitle = $title;
        $count = 1;

        $query = $model::where('tenant_id', $tenantId)
                       ->where('name', $title);

        if ($id !== null) {
            $query->where('id', '!=', $id);
        }

        while ($query->exists()) {
            $title = $originalTitle . ' Copy ' . $count;
            $count++;
            $query = $model::where('tenant_id', $tenantId)
                           ->where('name', $title);
            if ($id !== null) {
                $query->where('id', '!=', $id);
            }
        }
        return $title;
    }
}

if (!function_exists('renderBladeFromDB')) {
    function renderBladeFromDB($caseStudies, $code)
    {
        $uniqId = uniqid();

        //check if request is coming from tenant domain
        if(!tenant('id')) {
             // Define a temporary file path
            $temporaryBladeFilePath = storage_path('tenant'.currentTenantId().'/framework/temp_template_' . $uniqId . '.blade.php');
            
            if(file_exists($temporaryBladeFilePath)) {
                $temporaryBladeFilePath = storage_path('tenant'.currentTenantId().'/framework/temp_template_' . $uniqId . '.blade.php');
            }
        } else {
             // Define a temporary file path
            $temporaryBladeFilePath = storage_path('framework/temp_template_' . $uniqId . '.blade.php');
            
            if(file_exists($temporaryBladeFilePath)) {
                $temporaryBladeFilePath = storage_path('framework/temp_template_' . $uniqId . '.blade.php');
            }
        }

        // dd($temporaryBladeFilePath);

        // Write the template content to the temporary Blade file
        file_put_contents($temporaryBladeFilePath, $code);

        // Render the temporary Blade file
        $output = view()->file($temporaryBladeFilePath, ['caseStudies' => $caseStudies])->render();

        // Optionally, delete the temporary file after rendering
        unlink($temporaryBladeFilePath);

        return $output;
    }
}


if (!function_exists('getCurrentTenantDomain')) {
    function getCurrentTenantDomain()
    {
        if(currentTenantId()) {
            $domain = Tenant::find(currentTenantId())->domains()->first();
            return 'https://'.$domain;
        } else {
            return null;
        }
    }
}

if(!function_exists('getExistingFavicon')) {
    function getExistingFavicon() 
    {
        $file = public_path('storage/'.currentTenantId().'/images/'.getTemplateOption('favicon'));
        if(file_exists($file)) {
            return asset('storage/'.currentTenantId().'/images/'.getTemplateOption('favicon'));
        } else {
            return asset('/templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/favicon/'.getTemplateOption('favicon'));
        }
        
        return null;
    }
}

if(!function_exists('getExistingLogo')) {
    function getExistingLogo() 
    {
        $file = public_path('storage/'.currentTenantId().'/images/'.getTemplateOption('logo'));
        if(file_exists($file)) {
            return asset('storage/'.currentTenantId().'/images/'.getTemplateOption('logo'));
        } else {
            return asset('/templates/'.strtolower(getSelectedTemplate()->name).'/assets/images/logo/'.getTemplateOption('logo'));
        }
        
        return null;
    }
}

if (!function_exists('setPreference')) {
    function setPreference($key, $value) {
        $tenantTemplatePreference = TenantTemplatePreference::where('key',$key)->whereTenantId(currentTenantId())->first();
        $tenantTemplatePreference->value = $value;
        $tenantTemplatePreference->save();

        return true;
    }
}

if (!function_exists('getPreference')) {
    function getPreference($key) {
        $value = TenantTemplatePreference::whereKey($key)->whereTenantId(currentTenantId())->first();

        if($value) {
            return $value->value;
        }

        return null;
    }
}