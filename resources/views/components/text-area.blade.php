<label class="block {{ $labelClass ?? '' }}">
    <textarea
      rows="{{ $rows ?? '' }}"
      placeholder="{{ $placeholder }}"
      class="{{ $class ?? '' }} @error($name) 'border-error' @enderror form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
      name="{{ $name }}"
      {{ $attributes }}
      ></textarea>
</label>
@error($name)
<p class="text-tiny+ text-error mt-1">{{ $message }}</p>
@enderror