@props(['label', 'class', 'name', 'placeholder', 'labelClass'])
<span class="relative mt-1.5 flex">
  @isset($label)
  <span>{{ $label }}</span>
  @endisset
  <input
    x-init="$el._x_flatpickr = flatpickr($el, {dateFormat: 'Y-m-d',defaultDate: new Date() })"
    class="{{ $class ?? '' }} @error($name) 'border-error' @enderror form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
    placeholder="{{ $placeholder }}"
    type="text"
    name="{{ $name }}"
    {{ $attributes }}
  />
  <span
    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-5 w-5 transition-colors duration-200"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
      stroke-width="1.5"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
      />
    </svg>
  </span>
</span>
@error($name)
<p class="text-tiny+ text-error mt-1">{{ $message }}</p>
@enderror