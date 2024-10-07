<main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="{ }">
    <form wire:submit.prevent="update">
      <div
        class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6"
      >
        <div class="flex items-center space-x-1">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
            />
          </svg>
          <h2
            class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50"
          >
            {{ __('Profile') }}
          </h2>
        </div>
      </div>
      <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 lg:col-span-4">
          <div class="card p-4 sm:p-5">
            <div class="flex items-center space-x-4">
              <div class="avatar h-14 w-14">
                {!! auth()->user()->userAvatarImage !!}
              </div>
              <div>
                <h3
                  class="text-base font-medium text-slate-700 dark:text-navy-100"
                >
                  {{ auth()->user()->name }}
                </h3>
                <p class="text-xs+">{{ auth()->user()->userCurrentPlan->name }}</p>
              </div>
            </div>
            <x-profile-nav/>
          </div>
        </div>
        <div class="col-span-12 lg:col-span-8">
          <div class="card">
            <div
              class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
            >
              <h2
                class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
              >
                Account Setting
              </h2>
              <div class="flex justify-center space-x-2">
                <x-primary-button
                    class="inline-flex items-center"
                    label="{{ __('Save') }}"
                    wire:target="update"
                >
                </x-primary-button>
              </div>
            </div>
            <div class="p-4 sm:p-5">
              <div class="flex flex-col">
                <span
                  class="text-base font-medium text-slate-600 dark:text-navy-100"
                  >Profile Image</span
                >
                <div class="avatar mt-1.5 h-28 w-28">
                    <x-filepond-profile-img wire:model="image" name="image" existingFiles="{{ auth()->user()->getMedia('avatars') }}" allowFileTypeValidation acceptedFileTypes="['image/png', 'image/jpg', 'image/webp']" allowFileSizeValidation maxFileSize="5000000"  class="relative mt-1.5"></x-filepond-profile-img>
                    
                </div>
              </div>
              <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <x-input 
                    type="text" 
                    name="name" 
                    wire:model="name"
                    placeholder="{{ __('Enter full name') }}" 
                    label="{{ __('Full Name') }}" 
                    class="" 
                    labelClass="font-medium text-slate-600 dark:text-navy-100"
                >
                </x-input>
                <x-input 
                    type="email" 
                    name="email" 
                    wire:model="email"
                    label="{{ __('Email Address') }}" 
                    placeholder
                    class="" 
                    labelClass="font-medium text-slate-600 dark:text-navy-100"
                    disabled
                >
                </x-input>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </main>