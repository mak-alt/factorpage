@props(['class', 'label'])
<button
    class="btn {{ $class }} bg-secondary font-medium text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90" 
    {{ $attributes }}
    >
    {{ $label }}
</button>
