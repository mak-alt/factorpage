<?php

namespace App\Livewire\Billing;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Payment;
use Livewire\Component;
use Laravel\Cashier\Cashier;
use App\Listeners\StripeEventListener;

class Success extends Component
{

    public function render()
    {
        $payment = $this->handleSuccessCall();
        event(new StripeEventListener());
        return view('livewire.billing.success',['payment' => $payment])
                ->layout('components.base-layout')
                ->title('Thankyou');
    }

    protected function handleSuccessCall()
    {
        $sessionId = request()->get('session_id');
 
        $paymentId = Cashier::stripe()->checkout->sessions->retrieve($sessionId)['metadata']['payment_id'] ?? null;
    
        $payment = Payment::findOrFail($paymentId);
    
        $payment->update(['status' => 'completed']);

        // make this plan active for this user
        $planId = Cashier::stripe()->checkout->sessions->retrieve($sessionId)['metadata']['plan_id'] ?? null;
        $plan = Plan::findOrFail($planId);

        $planUpdate = auth()->user()->plans()->update(['is_current' => 0]);
        if($plan->type === 'monthly') {
            auth()->user()->plans()->attach(
                $plan->id, ['expiry_date' => Carbon::now()->addMonths(1), 'is_current' => 1]
            );
        } else {
            auth()->user()->plans()->attach(
                $plan->id, ['expiry_date' => Carbon::now()->addMonths(12), 'is_current' => 1]
            );
        }
        
        return $payment;
    }
}
