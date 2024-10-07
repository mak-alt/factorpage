<?php

namespace App\Listeners;

use App\Events\ManageTenant;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SwitchTenantListener
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
        if ($event->action === 'switch') {
            // Logic for switching the tenant
            // You can add additional validation or customization here
        }
    }
}
