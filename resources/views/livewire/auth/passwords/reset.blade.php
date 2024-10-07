<main class="grid w-full grow grid-cols-1 place-items-center">
    <div class="w-full max-w-[26rem] p-4 sm:px-5">
        <div class="text-center">
            <x-logo/>
            <div class="mt-4">
                <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                    {{ __('Reset Password') }}
                </h2>
                <p class="text-slate-400 dark:text-navy-300">
                    {{ __('Create your new password here.') }}
                </p>
            </div>
        </div>
        <div class="card mt-5 rounded-lg p-5 lg:p-7">
            <form wire:submit.prevent="resetPassword">
                <input wire:model="token" type="hidden">
                <x-login-input wire:model.lazy="email" type="email" placeholder="{{ __('Enter Email') }}" name="email" label="{{ __('Email') }}" required>
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
                <x-login-input wire:model.lazy="passwordConfirmation" type="password" placeholder="{{ __('Enter Password Again') }}" name="passwordConfirmation" label="{{ __('Confirm Password') }}" labelClass="mt-4" required>
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                </x-login-input>
                <x-primary-button wire:target="resetPassword" class="mt-5 w-full disabled:pointer-events-none disabled:select-none disabled:opacity-60" label="{{ __('Reset password') }}"/>
            </form>
        </div>
    </div>
</main>
