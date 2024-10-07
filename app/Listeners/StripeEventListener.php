<?php

namespace App\Listeners;

use App\Mail\SendMembershipInvoice;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Cashier\Events\WebhookReceived;
use Laravel\Cashier\Cashier;

class StripeEventListener
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
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'invoice.payment_succeeded') {
            $invoice = $event->payload['data']['object'];
            $user = Cashier::findBillable($invoice['customer']);
            Mail::to($user->email)->send(new SendMembershipInvoice($invoice, $user));
        }
    }
}
