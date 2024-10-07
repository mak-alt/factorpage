@props(['label', 'name', 'class', 'labelClass'])
<label class="inline-flex items-center space-x-2 {{ $labelClass ?? '' }}">
    <input
      class="{{ $class ?? '' }}form-switch h-5 w-10 rounded-full bg-slate-300 [--thumb-border:4px] before:rounded-full before:bg-slate-50 checked:bg-primary checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white"
      type="checkbox"
      name="{{ $name }}"
      {{ $attributes }}
    />
    <span>{{ $label }}</span>
</label>
