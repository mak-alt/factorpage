<div
    class="card col-span-12 mt-12 bg-gradient-to-r from-blue-500 to-blue-600 p-5 sm:col-span-8 sm:mt-0 sm:flex-row"
>
    <div class="flex justify-center sm:order-last">
    <img
        class="-mt-16 h-40 sm:mt-0"
        src="{{ asset('images/illustrations/rocket.svg') }}"
        alt="image"
    />
    </div>
    <div
    class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left"
    >
    <h3 class="text-xl">
        Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span>
    </h3>
    <p class="mt-2 leading-relaxed">Your Current Plan:</p>
    <p><span class="font-semibold">{{ Auth::user()->userCurrentPlan->name }}</span></p>

    <a
        href="{{ route('pricing') }}"
        class="btn mt-6 bg-slate-50 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80"
    >
        Change Plan
    </a>
    </div>
</div>