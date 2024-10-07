<?php

namespace App\Listeners;

use App\Events\ManageTenant;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetTenantListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ManageTenant $event)
    {
        if ($event->action === 'set') {
            // Logic for setting the tenant
            session()->put('tenant_id', $event->tenantId);
        }
    }
}
