@props(['label', 'name', 'labelClass'])
<label class="inline-flex items-center space-x-2 {{ $labelClass ?? '' }}">
    <input
        name="{{ $name }}"
        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
        type="checkbox"
        {{ $attributes }} />
    <span class="line-clamp-1">{{ $label }}</span>
</label>
@error($name)
<p class="text-tiny+ text-error mt-1">{{ $message }}</p>
@enderror