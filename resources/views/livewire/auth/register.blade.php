<main class="grid w-full grow grid-cols-1 place-items-center">
    <div class="w-full max-w-[26rem] p-4 sm:px-5">
        <div class="text-center">
            <x-logo/>
            <div class="mt-4">
                <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                    {{ __('Welcome To FactorPage') }}
                </h2>
                <p class="text-slate-400 dark:text-navy-300">
                    {{ __('Create your account') }}
                </p>
            </div>
        </div>
        <div class="card mt-5 rounded-lg p-5 lg:p-7">
            <form wire:submit.prevent="register">
                <x-login-input wire:model.lazy="name" type="text" placeholder="{{ __('Enter Name') }}" name="name" label="{{ __('Name') }}"  required>
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </span>
                </x-login-input>
                <x-login-input wire:model.lazy="email" type="email" placeholder="{{ __('Enter Email') }}" name="email" label="{{ __('Email') }}" labelClass="mt-4" required>
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </x-login-input>
                <x-login-input wire:model.lazy="password" type="password" placeholder="{{ __('Enter Password') }}" name="password" label="{{ __('Password') }}" labelClass="mt-4" required>
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                </x-login-input>
                <x-primary-button wire:target="register" class="mt-5 w-full disabled:pointer-events-none disabled:select-none disabled:opacity-60" label="{{ __('Sign up') }}"/>
            </form>
            <div class="mt-4 text-center text-xs+">
                <p class="line-clamp-1">
                    <span>{{ __('Already have an account?') }}</span>

                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route('login') }}" >{{ __('Sign In') }}</a>
                </p>
            </div>
            <div class="my-7 flex items-center space-x-3">
                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                <p>{{ __('OR') }}</p>
                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
            </div>
            <div class="flex space-x-4">
                <button
                    class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    <img class="h-5.5 w-5.5 " src="{{ asset('images/logos/google.svg') }}" /> <span>{{ __('Sign up with Google') }}</span>
                </button>
            </div>
        </div>
    </div>
</main>