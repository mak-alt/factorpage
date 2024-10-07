@props(['label', 'placeholder', 'type', 'name', 'labelClass'])
<label class="block {{ $labelClass ?? '' }}">
    @isset($label)
    <span>{{ $label }}:</span>
    @endisset
    <span class="relative mt-1.5 flex">
        <input
            class="@error($name) !border-error @enderror form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
            placeholder="{{ $placeholder }}" type="{{ $type }}" name="{{ $name }}" {{ $attributes }} />
        {{ $slot }}
    </span>
    @error($name)
    <p class="text-tiny+ text-error mt-1">{{ $message }}</p>
    @enderror
</label>