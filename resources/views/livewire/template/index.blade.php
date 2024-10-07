<main class="main-content !ml-0 w-full px-[var(--margin-x)] pb-8" x-data="{ selectedCard: null }">
    <div class="text-center">
        <x-logo/>
    </div>
    <div class="flex items-center justify-between py-5 lg:py-6 mt-2">
      <div class="flex items-center space-x-1">
        <h2
          class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl"
        >
          Choose Template
        </h2>
      </div>
    </div>
    <div
      class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-4 lg:gap-6 xl:grid-cols-5">
    @foreach($templates as $template)
      <div @click="selectedCard = {{ $template->id }}"
        :class="{ 'outline outline-offset-2 outline-2 outline-blue-500': selectedCard === {{ $template->id }} }" 
        class="card hover:outline hover:outline-offset-2 hover:outline-2 hover:outline-blue-500">
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
          </div>

          <div class="mt-3 text-center">
            
          </div>
        </div>
      </div>
    @endforeach
    </div>
    <!-- Fixed Button -->
    <a x-show="selectedCard" href="javascript:;" @click="$wire.selectedTemplate(selectedCard)">
      <x-primary-button
          class="fixed bottom-8 left-1/2 transform -translate-x-1/2 transition-transform duration-500 ease-in-out rounded-full shadow-lg hover:opacity-80 inline-flex"
          label="Continue to Dashboard"
          >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-6 sm:w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
      </x-primary-button>
    </a>
  </main>
{{-- <x-notification/> --}}