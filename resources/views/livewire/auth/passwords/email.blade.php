<main class="grid w-full grow grid-cols-1 place-items-center">
    <div class="w-full max-w-[26rem] p-4 sm:px-5">
        <div class="text-center">
            <x-logo/>
            <div class="mt-4">
                <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                    {{ __('Reset Password') }}
                </h2>
                <p class="text-slate-400 dark:text-navy-300">
                    {{ __('Please enter your email to get password reset link.') }}
                </p>
            </div>
        </div>
        @if ($emailSentMessage)
        <div class="mt-5 p-5 lg:p-7 alert flex rounded-lg bg-slate-200 px-4 py-4 text-slate-600 dark:bg-navy-500 dark:text-navy-100 sm:px-5">
            <div class="flex flex-1 items-center space-x-3 p-4">
                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div class="flex-1">{{ $emailSentMessage }}</div>
            </div>
            <div class="w-1.5 bg-primary"></div>
        </div>
        @else
        <div class="card mt-5 rounded-lg p-5 lg:p-7">
            <form wire:submit.prevent="sendResetPasswordLink">
                <x-login-input wire:model.lazy="email" type="email" autofocus placeholder="{{ __('Enter Email') }}" name="email" label="{{ __('Email') }}" required>
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </x-login-input>
                <x-primary-button wire:target="sendResetPasswordLink" class="mt-5 w-full disabled:pointer-events-none disabled:select-none disabled:opacity-60" label="{{ __('Send password reset link') }}"/>
            </form>
        </div>
        @endif
    </div>
</main>