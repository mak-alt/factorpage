<?php

namespace App\Livewire\Billing;

use App\Listeners\StripeEventListener;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Payment;
use Livewire\Component;

class Pricing extends Component
{

    public $monthly_plans;

    public $annually_plans;

    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->monthly_plans = Plan::active()->monthly()->orderBy('id')->get();
        $this->annually_plans = Plan::active()->annually()->orderBy('id')->get();
    }

    public function subscribe($plan_id, $plan_name = null, $stripe_price_id = null)
    {
        //get plan details
        $plan = Plan::findOrFail($plan_id);

        if(!$stripe_price_id && $plan_name == 'Free') {
            return back(); 
        }
        
        if($this->user->hasSubscription() && $this->user->subscribedToPrice($stripe_price_id, $plan_name)) {
            $this->dispatch('notification:default',[
                'message' => __('Subscription already active')
            ]);

            return back();
        }

        if($this->user->hasSubscription()) {
            $swapPlan = $this->user->subscription(auth()->user()->userCurrentPlan->name)->swapAndInvoice($stripe_price_id);
            $swapPlan->fill(['type' => $plan_name])->save();

            // change user plan
            $this->user->plans()->update(['is_current' => 0]);
            if($plan->type === 'monthly') {
                $this->user->plans()->attach(
                    $plan->id, ['expiry_date' => Carbon::now()->addMonths(1), 'is_current' => 1]
                );
            } else {
                $this->user->plans()->attach(
                    $plan->id, ['expiry_date' => Carbon::now()->addMonths(12), 'is_current' => 1]
                );
            }

            event(new StripeEventListener());

            $this->dispatch('notification:default',[
                'message' => __('Subscription plan updated successfully.')
            ]);

            return back();
        }
        
        // push payment request to payments schema
        $payment = Payment::create([
            'user_id' => auth()->user()->id,
            'plan_id' => $plan_id,
            'currency' => 'USD',
            'charge_id' => '',
            'method' => 'stripe',
            'amount' => $plan->price,
            'status' => 'pending'
        ]);
        
        return $this->user
        ->newSubscription($plan_name, $stripe_price_id)
        ->allowPromotionCodes()
        ->checkout([
            'success_url' => route('billing.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('billing.cancel'),
            'metadata' => ['payment_id' => $payment->id, 'plan_id' => $plan->id],
        ]);
    }

    public function render()
    {
        return view('livewire.billing.pricing')
                ->layout('components.base-layout')
                ->title('Pricing | FactorPage');
    }
}
