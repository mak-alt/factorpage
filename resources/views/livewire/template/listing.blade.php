<main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between py-5 lg:py-6 mt-2">
            <div class="flex items-center space-x-1">
                <h2
                class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl"
                >
                FactorPage Templates
                </h2>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            @foreach($templates as $template)
            <div 
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
                    @if($template->id !== $tenant_template->id)
                    <div class="mt-6 grid w-full grid-cols-1 gap-2">
                        <x-primary-button
                            label="Select {{ $template->name }}"
                            class=""
                            wire:click="selectedTemplate({{ $template->id }})"
                            wire:target="selectedTemplate({{ $template->id }})"
                            >
                        </x-primary-button>
                    </div>
                    @else
                    <div class="mt-6 grid w-full grid-cols-1 gap-2">
                        <x-button
                            label="Current Template"
                            class=" bg-black font-medium text-white hover:bg-black-focus focus:bg-black-focus active:bg-black-focus/90"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-6 sm:w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </x-button>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
  </main>
{{-- <x-notification/> --}}