@props(['label', 'placeholder', 'name', 'type', 'class', 'labelClass'])
<label class="block {{ $labelClass ?? '' }}">
    @isset($label)
    <span>{{ $label }}</span>
    @endisset
    <input
      class="{{ $class }} @error($name) border-error dark:border-error @else border-slate-300 dark:border-navy-450 @enderror form-input mt-1.5 w-full rounded-lg border  bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:hover:border-navy-400 dark:focus:border-accent"
      placeholder="{{ $placeholder }}"
      name="{{ $name }}"
      type="{{ $type }}"
      {{ $attributes }}
    />
    @error($name)
    <p class="text-tiny+ text-error mt-1">{{ $message }}</p>
    @enderror
</label>