<!-- Main Content Wrapper -->
<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div
          class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6"
        >
          <div class="col-span-12 lg:col-span-8 xl:col-span-9">
            <livewire:widget.welcome-widget lazy /> 
            <livewire:widget.case-study-count-widget lazy /> 
            
          </div>
          <div class="col-span-12 lg:col-span-4 xl:col-span-3">
            <livewire:widget.current-template-widget lazy /> 
          </div>
    </div>
    <div
        class="mt-4 transition-all duration-[.25s] sm:mt-5 lg:mt-6"
    >
        <div class="flex h-8 items-center justify-between">
        <h2
            class="text-base font-medium tracking-wide text-slate-700 dark:text-navy-100"
        >
            Recent Case Studies
        </h2>
        <a
            href="{{ route('case-study.manage') }}"
            class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70"
            >View All</a
        >
        </div>
        <div
            class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4"
        >
            <livewire:widget.recent-case-studies-widget lazy /> 
        </div>
    </div>
</main>