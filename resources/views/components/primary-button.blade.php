@props(['class', 'label'])
<button wire:loading.attr="disabled"  class="btn {{ $class }} bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" {{ $attributes }}>
    <div class="relative flex items-center justify-center ">
       <div wire:target="{{ $attributes->wire('target')->value() }}" class="duration-100 undefined opacity-1" wire:loading.class.remove="opacity-1" wire:loading.class="opacity-0">{{ $label }}</div>
       <div wire:target="{{ $attributes->wire('target')->value() }}" wire:loading.class.remove="opacity-0 pointer-events-none" wire:loading.class="false" class="opacity-0 pointer-events-none absolute inset-0 flex items-center justify-center">
            <span wire:loading wire:target="{{ $attributes->wire('target')->value() }}">
                <div
                    class="spinner h-5 w-5 animate-spin rounded-full border-[3px] border-slate-100 border-r-primary"
                ></div>
            </span>
       </div>
    </div>
 </button>