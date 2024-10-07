@props(['label', 'class', 'name', 'labelClass'])
<label class="block {{ $labelClass ?? '' }}">
    @isset($label)
    <span>{{ $label }}</span>
    @endisset
    <select
      class="{{ $class ?? '' }} @error($name) 'border-error' @enderror form-select mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"      "
      name="{{ $name }}"
      {{ $attributes }}
    >
      {{ $slot }}
    </select>
</label>
@error($name)
<p class="text-tiny+ text-error mt-1">{{ $message }}</p>
@enderror
