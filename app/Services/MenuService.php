<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\TenantTemplatePreference;
use Illuminate\Support\Collection;

class MenuService
{
    public function getMenuItems(string $tenantId): Collection
    {
        $selectedMenuIds = TenantTemplatePreference::where('tenant_id', $tenantId)
            ->where('key', 'menu_ids')
            ->value('value');

        $menu = Menu::with(['menuItems' => function ($query) {
                $query->orderBy('sort');
            }])
            ->whereId($selectedMenuIds)
            ->whereStatus('active')
            ->first();
        
        if(!$menu) {
            return collect([]);
        }

        return $menu->menuItems->map(function ($menuItem) {
            return [
                'name' => $menuItem->name,
                'link' => $menuItem->link,
                'target' => $menuItem->target
            ];
        });
    }
}