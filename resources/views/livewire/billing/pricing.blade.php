<!-- Main Content Wrapper -->
<main class="main-content !ml-0 w-full px-[var(--margin-x)] pb-8"  x-data="{ isSwitchOn: false }">
  <div class="mt-12 text-center">
    <x-logo/>
    <h1
      class="text-3xl font-bold leading-normal sm:text-4xl sm:leading-normal text-black dark:text-white"
    >
      Upgrade your plan
    </h1>
    <p class="mt-1 text-lg text-gray-500">
      Upgrade your plan to get much more out of FactorPage.
    </p>
    <div class="switch-annually mt-4">
        <label class="inline-flex items-center space-x-2">
            <span class="text-base">Monthly</span>
            <input
              x-model="isSwitchOn"
              class="form-switch h-7 w-14 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:bg-primary checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white"
              type="checkbox"
            />
            <span class="text-base">Annually</span>
        </label>
    </div>
  </div>
  <div class="mx-auto mt-8 grid w-full max-w-4xl grid-cols-1 gap-5 md:grid-cols-3 lg:grid-cols-3 lg:gap-6">
    {{-- Monthly Plans --}}
    @foreach($monthly_plans as $plan)
    @if($plan->is_featured)
    <div x-show="!isSwitchOn" class="card p-3 sm:p-4 bg-gradient-to-r from-blue-500 to-purple-700 text-white" wire:key="{{ $plan->id }}">
        <div class="inline-space mt-5">
            <div class="badge bg-yellow-500 text-black dark:bg-yellow-300 dark:text-black">{{ $plan->name }}</div>
        </div>
        <div class="mb-2 mt-4 flex items-end text-4xl md:text-5xl font-extrabold tracking-tight">${{ $plan->price }} <span class="mb-1 text-sm opacity-80">/ mo.</span></div>
        <div class="mt-2 text-sm">
            billed monthly
        </div>
        <div class="mt-4 flex flex-col gap-2 text-gray-200">
            @foreach($plan->features as $feature)
            <div class="flex items-center gap-2">
                <div class="flex-none">
                    @if($feature['status'] === true)
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    @else
                    <svg class="flex-none text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    @endif
                </div>
                <div class="text-sm md:text-base underline decoration-dashed underline-offset-4">
                    {{ $feature['text'] }}
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-2 flex-grow"></div>
        <div class="mt-5 pb-1">
            @if(!auth()->user()->isSubscribedToPremiumPlan($plan->stripe_price_id, $plan->name))
            <x-button 
                wire:click="subscribe({{ $plan->id }},'{{ $plan->name }}', '{{ $plan->stripe_price_id }}')"
                wire:loading.attr="disabled" 
                wire:target="subscribe({{ $plan->id }},'{{ $plan->name }}', '{{ $plan->stripe_price_id }}')" 
                label="Upgrade" 
                class="w-full bg-black text-white"
            >
            </x-button>
            @else
            <x-button 
                label="Current Plan" 
                disabled 
                class="w-full bg-black text-white"
            >
            </x-button>
            @endif
        </div>
    </div>
    @else
    <div x-show="!isSwitchOn" class="card p-3 sm:p-4" wire:key="{{ $plan->id }}">
        <div class="inline-space mt-5">
            <div class="badge bg-slate-150 text-slate-800 dark:bg-navy-500 dark:text-navy-100">{{ $plan->name }}</div>
        </div>
        <div class="mb-2 mt-4 flex items-end text-4xl md:text-5xl font-extrabold tracking-tight text-black dark:text-white">${{ $plan->price }} <span class="mb-1 text-sm opacity-80">/ mo.</span></div>
        <div class="mt-2 text-sm">
            billed monthly
        </div>
        <div class="mt-4 flex flex-col gap-2">
            @foreach($plan->features as $feature)
            <div class="flex items-center gap-2 text-gray-500">
                <div class="flex-none">
                    @if($feature['status'] === true)
                    <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    @else
                    <svg class="flex-none text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    @endif
                </div>
                <div class="text-sm md:text-base underline decoration-dashed underline-offset-4 decoration-gray-200">
                    {{ $feature['text'] }}
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-2 flex-grow"></div>
        <div class="mt-5 pb-1">
            @if(!auth()->user()->isSubscribedToPremiumPlan($plan->stripe_price_id, $plan->name))
            <x-primary-button 
                label="Upgrade" 
                class="w-full" 
                wire:click="subscribe({{ $plan->id }},'{{ $plan->name }}', '{{ $plan->stripe_price_id }}')"
                wire:loading.attr="disabled" 
                wire:target="subscribe({{ $plan->id }},'{{ $plan->name }}', '{{ $plan->stripe_price_id }}')" 
            >
            </x-primary-button>
            @else
            <x-primary-button 
                label="Current Plan" 
                disabled 
                class="w-full"
            >
            </x-primary-button>
            @endif
        </div>
    </div>
    @endif
    @endforeach

    {{-- Annually Plans--}}
    @foreach($annually_plans as $plan)
    @if($plan->is_featured)
    <div x-show="isSwitchOn" class="card p-3 sm:p-4 bg-gradient-to-r from-blue-500 to-purple-700 text-white" wire:key="{{ $plan->id }}">
        <div class="inline-space mt-5">
            <div class="badge bg-yellow-500 text-black dark:bg-yellow-300 dark:text-black">{{ $plan->name }}</div>
        </div>
        <div class="mb-2 mt-4 flex items-end text-4xl md:text-5xl font-extrabold tracking-tight">${{ $plan->price }} <span class="mb-1 text-sm opacity-80">/ mo.</span></div>
        <div class="mt-2 text-sm">
            billed annually
        </div>
        <div class="mt-4 flex flex-col gap-2 text-gray-200">
            @foreach($plan->features as $feature)
            <div class="flex items-center gap-2">
                <div class="flex-none">
                    @if($feature['status'] === true)
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    @else
                    <svg class="flex-none text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    @endif
                </div>
                <div class="text-sm md:text-base underline decoration-dashed underline-offset-4">
                    {{ $feature['text'] }}
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-2 flex-grow"></div>
        <div class="mt-5 pb-1">
            @if(!auth()->user()->isSubscribedToPremiumPlan($plan->stripe_price_id, $plan->name))
            <x-button 
                wire:click="subscribe({{ $plan->id }},'{{ $plan->name }}', '{{ $plan->stripe_price_id }}')"
                wire:loading.attr="disabled" 
                wire:target="subscribe({{ $plan->id }},'{{ $plan->name }}', '{{ $plan->stripe_price_id }}')" 
                label="Upgrade" 
                class="w-full bg-black text-white"
            >
            </x-button>
            @else
            <x-button 
                label="Current Plan" 
                disabled 
                class="w-full bg-black text-white"
            >
            </x-button>
            @endif
        </div>
    </div>
    @else
    <div x-show="isSwitchOn" class="card p-3 sm:p-4" wire:key="{{ $plan->id }}">
        <div class="inline-space mt-5">
            <div class="badge bg-slate-150 text-slate-800 dark:bg-navy-500 dark:text-navy-100">{{ $plan->name }}</div>
        </div>
        <div class="mb-2 mt-4 flex items-end text-4xl md:text-5xl font-extrabold tracking-tight text-black dark:text-white">${{ $plan->price }} <span class="mb-1 text-sm opacity-80">/ mo.</span></div>
        <div class="mt-2 text-sm">
            billed anually
        </div>
        <div class="mt-4 flex flex-col gap-2">
            @foreach($plan->features as $feature)
            <div class="flex items-center gap-2 text-gray-500">
                <div class="flex-none">
                    @if($feature['status'] === true)
                    <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    @else
                    <svg class="flex-none text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    @endif
                </div>
                <div class="text-sm md:text-base underline decoration-dashed underline-offset-4 decoration-gray-200">
                    {{ $feature['text'] }}
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-2 flex-grow"></div>
        <div class="mt-5 pb-1">
            @if(!auth()->user()->isSubscribedToPremiumPlan($plan->stripe_price_id, $plan->name))
            <x-primary-button 
                label="Upgrade" 
                class="w-full" 
                wire:click="subscribe({{ $plan->id }},'{{ $plan->name }}', '{{ $plan->stripe_price_id }}')"
                wire:loading.attr="disabled" 
                wire:target="subscribe({{ $plan->id }},'{{ $plan->name }}', '{{ $plan->stripe_price_id }}')" 
            >
            </x-primary-button>
            @else
            <x-primary-button 
                label="Current Plan" 
                disabled 
                class="w-full"
            >
            </x-primary-button>
            @endif
        </div>
    </div>
    @endif
    @endforeach
  </div>

  <!-- Cross button icon -->
  <a href="{{ route('dashboard') }}" class="absolute top-4 right-4 p-2 bg-gray-300 rounded-full xl:block lg:block md:block sm:hidden">
    <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="6" y1="6" x2="18" y2="18"></line>
        <line x1="6" y1="18" x2="18" y2="6"></line>
    </svg>
  </a>
</main>
<x-notification/>