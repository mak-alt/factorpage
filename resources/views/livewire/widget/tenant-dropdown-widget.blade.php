<div
    x-data="usePopper({placement:'bottom-start',offset:4})"
    @click.outside="isShowPopper && (isShowPopper = false)"
    class="inline-flex"
>
    <button
    class="btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
    x-ref="popperRef"
    @click="isShowPopper = !isShowPopper"
    >
    <span>{{ Auth::user()->company_name . ' ' . Auth::user()->userCurrentPlan->name }}</span>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-4 w-4 transition-transform duration-200"
        :class="isShowPopper && 'rotate-180'"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2"
    >
        <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M19 9l-7 7-7-7"
        />
    </svg>
    </button>
    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
    <div
        class="popper-box w-72 rounded-md border border-slate-150 bg-white dark:border-navy-600 dark:bg-navy-700"
    >
        <ul class="my-2">
        <li>
            <a
            href="#"
            class="flex items-center space-x-3.5 px-4 py-2 pr-8 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
            >
            <div>
                <p class="text-slate-700 line-clamp-1 dark:text-navy-100">
                {{ Auth::user()->company_name }}
                </p>
                <p class="text-xs text-slate-500 dark:text-navy-300">
                {{ Auth::user()->tenants()->first()->domains()->first()->name }}
                </p>
            </div>
            </a>
        </li>
        </ul>
    </div>
    </div>
</div>