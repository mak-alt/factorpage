<main class="grid w-full grow grid-cols-1 place-items-center">
    <div class="w-full max-w-[30rem] p-4 sm:px-5">
        <div class="text-center">
            <x-logo/>
            <div class="mt-4">
                <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                    {{ __('Welcome to FactorPage') }}
                </h2>
                <p class="text-slate-400 dark:text-navy-300">
                    {{ __('Please enter your company name so we can setup your website for you!') }}
                </p>
            </div>
        </div>
        <div class="card mt-5 rounded-lg p-5 lg:p-7" x-data="{ companyName: '' }">
            <form wire:submit.prevent="createTenant">
                <x-filled-input x-model="companyName" wire:model.live="company_name" type="text" autofocus placeholder="{{ __('Enter your company name') }}" name="company_name" class="!py-3" required>
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </x-filled-input>
                <div class="mt-4" x-show="companyName !== ''">
                    <div class="flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            https://
                        </span>
                        <input disabled name="" type="text" id="companyName" x-bind:value="companyName.toString().toLowerCase()
                        .replace(/\s+/g, '-')           // Replace spaces with -
                        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                        .replace(/^-+/, '')             // Trim - from start of text
                        .replace(/-+$/, '')" placeholder="company"
                        class="flex-1 block rounded-none form-input w-full border border-r-1 border-gray-300 bg-gray-50 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:hover:border-navy-400 dark:focus:border-accent"/>
                        <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            .{{ config('app.main_domain') }}
                        </span>
                    </div>
                    <p class="text-primary dark:text-slate-200">You can access your website using this domain.</p>
                </div>
                <x-primary-button wire:target="createTenant" class="mt-5 w-full disabled:pointer-events-none disabled:select-none disabled:opacity-60" label="{{ __('Continue') }}"/>
            </form>
        </div>
    </div>
</main>
<x-notification/>