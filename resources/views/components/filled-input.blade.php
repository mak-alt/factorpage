@props(['label', 'placeholder', 'type', 'name', 'class', 'labelClass'])
<label class="block {{ $labelClass ?? '' }}">
    @isset($label)
    <span>{{ $label }}</span>
    @endisset
    <input
      class="{{ $class }} @error($name) 'border-error' @enderror form-input w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
      placeholder="{{ $placeholder }}"
      type="{{ $type }}"
      name="{{ $name }}"
      {{ $attributes }}
    />
</label>
@error($name)
<p class="text-tiny+ text-error mt-1">{{ $message }}</p>
@enderror