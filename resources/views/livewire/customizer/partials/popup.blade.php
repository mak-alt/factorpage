<div>
@if($isOpen)
    <template x-teleport="#x-teleport-target">
      <div
        class="fixed inset-0 z-[100] h-full min-h-screen flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
        role="dialog"
        @keydown.window.escape="@this.call('closeModal')"
        @click.away="@this.call('closeModal')"
      >
        <div
          class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300"
          x-transition:enter="ease-out"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="ease-in"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
        ></div>
        <div
          class="relative rounded-lg h-full bg-white px-4 py-5 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5  w-full sm:w-full max-w-[90rem]"
          
          x-transition:enter="ease-out"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="ease-in"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          x-data="{ selectedCaseStudies: {{ json_encode($selectedIds) }} }"
        >
        <div class="flex w-full items-center gap-4">
            <div>
               <h2 class="font-heading text-left text-xl font-semibold text-black dark:text-white">Choose Case Studies</h2>
               <p class="mt-1 text-gray-500">New case studies that you create will automatically get added to this widget</p>
            </div>
            <div class="flex-grow"></div>
            <x-button class="btn-white" label="Close" @click="$wire.closeModal"/>
            <x-primary-button class="" label="Save Filters" @click="$wire.selectCaseStudies(selectedCaseStudies)"/>
         </div>

          <div class="mt-10">
            @if($caseStudies->count() > 0)
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:grid-cols-4 lg:gap-6">
                @foreach($caseStudies as $caseStudy)
                <div 
                    class="card h-50 w-72" 
                    x-bind:class="{ 'border-2 border-blue-500': selectedCaseStudies.includes({{ $caseStudy->id }}) }" 
                    @click="
                        const index = selectedCaseStudies.indexOf({{ $caseStudy->id }});
                        if (index === -1) {
                            selectedCaseStudies.push({{ $caseStudy->id }});
                        } else {
                            selectedCaseStudies.splice(index, 1);
                        }
                    ">
                    <img class="h-50 w-72 rounded-lg object-cover object-center" src="{{ $caseStudy->photo }}" alt="{{ $caseStudy->name }}">
                    <div class="absolute inset-0 flex h-full w-full flex-col justify-end">
                      <div class="space-y-1.5 rounded-lg bg-gradient-to-t from-[#19213299] via-[#19213266] to-transparent px-4 pb-3 pt-12">
                        <div class="line-clamp-2">
                          <a href="#" class="text-base font-medium text-white">
                            {{ $caseStudy->name }}
                          </a>
                        </div>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10">
              <div class="px-6 py-12">
                 <div class="mx-auto grid max-w-lg justify-items-center text-center">
                    <div class="mb-4 rounded-full bg-slate-100 p-3 dark:bg-slate-500/20">
                       <svg class="h-6 w-6 text-slate-500 dark:text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                       </svg>
                    </div>
                    <h4 class="text-base font-semibold leading-6 text-gray-950 dark:text-white">
                       No case studies
                    </h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                       Create a case study to get started.
                    </p>
                    <a class="mt-2 btn  bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">Create case study</a>
                 </div>
              </div>
           </div>
            @endif
          </div>
        </div>
      </div>
    </template>
@endif
</div>
@push('script')
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('caseStudiesDataUpdated', function (updatedItems) {
            
        })
    })
</script>
@endpush