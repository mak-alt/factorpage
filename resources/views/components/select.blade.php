@props(['label', 'class', 'name', 'labelClass'])
<label class="block {{ $labelClass ?? '' }}">
    @isset($label)
    <span>{{ $label }}</span>
    @endisset
    <select
      class="{{ $class ?? '' }} @error($name) 'border-error' @enderror form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
      name="{{ $name }}"
      {{ $attributes }}
    >
      {{ $slot }}
    </select>
</label>
@error($name)
<p class="text-tiny+ text-error mt-1">{{ $message }}</p>
@enderror
