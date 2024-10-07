@props(['label', 'name', 'class', 'labelClass'])
<label class="inline-flex items-center space-x-2 {{ $labelClass ?? '' }}">
    <input
      class="{{ $class ?? '' }} form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 checked:border-slate-500 checked:bg-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-400 dark:checked:bg-navy-400"
      name="{{ $name }}"
      type="radio"
      {{ $attributes }}
    />
    <p>{{ $label }}</p>
</label>
@error($name)
<p class="text-tiny+ text-error mt-1">{{ $message }}</p>
@enderror