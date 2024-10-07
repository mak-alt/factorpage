<?php

namespace App\Providers;

use App\Events\ManageTenant;
use App\Events\TenantRegistered;
use App\Listeners\SetTenantListener;
use Illuminate\Support\Facades\Event;
use App\Listeners\StripeEventListener;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SwitchTenantListener;
use Laravel\Cashier\Events\WebhookReceived;
use App\Listeners\CreateDefaultCaseStudyListener;
use App\Listeners\InstallDefaultTemplateListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        WebhookReceived::class => [
            StripeEventListener::class,
        ],
        ManageTenant::class => [
            SetTenantListener::class,
            SwitchTenantListener::class,
        ],
        TenantRegistered::class => [
            InstallDefaultTemplateListener::class,
            CreateDefaultCaseStudyListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
