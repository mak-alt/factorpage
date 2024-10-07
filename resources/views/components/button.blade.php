@props(['class', 'label'])
<button
    class="btn {{ $class }} font-medium" 
    {{ $attributes }}
  >
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