<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">
    <div 
        class="card">
        <img
        src="{{ getTemplateImage($template) }}"
        class="h-48 w-full rounded-t-lg object-cover object-center"
        alt="images"
        />
        <div class="flex grow flex-col p-4">
            <div class="pt-2 line-clamp-2">
                <a
                    href="#"
                    class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                >{{ $template->name }}</a
                >
                <p class="mt-1 text-xs+">CURRENT TEMPLATE</p>
                <a
                    href="{{ route('customize.index') }}"
                    class="mt-1 w-20 pb-0.5 text-xs font-medium text-primary outline-none transition-colors duration-300 line-clamp-1 hover:text-primary focus:text-primary"
                    >Customize
                </a>
            </div>
        </div>
    </div>
</div>