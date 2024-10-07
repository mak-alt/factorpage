<label class="block {{ $labelClass ?? '' }}">
    <textarea
      rows="{{ $rows ?? '' }}"
      placeholder="{{ $placeholder }}"
      class="{{ $class ?? '' }} @error($name) 'border-error' @enderror form-textarea w-full resize-none rounded-lg bg-slate-150 p-2.5 placeholder:text-slate-400 dark:bg-navy-900 dark:placeholder:text-navy-300"
      name="{{ $name }}"
      {{ $attributes }} 
      ></textarea>
</label>
@error($name)
<p class="text-tiny+ text-error mt-1">{{ $message }}</p>
@enderror