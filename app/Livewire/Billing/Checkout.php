<?php

namespace App\Livewire\Billing;

use Livewire\Component;

class Checkout extends Component
{

    public function subscribe()
    {
        return request()->user()
        ->newSubscription('starter', 'price_1OWQs6EPaUI7yfwPKuUvH0wN')
        ->checkout([
            'success_url' => route('billing.success'),
            'cancel_url' => route('billing.cancel'),
        ]);
    }

    public function render()
    {
        return view('livewire.billing.checkout')
                ->layout('components.base-layout')
                ->title('Checkout | FactorPage');
    }
}
