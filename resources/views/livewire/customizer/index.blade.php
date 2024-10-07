<!-- Page Wrapper -->
<div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900 flex-col overflow-hidden" x-cloak>
    <!-- App Header -->
    <form wire:submit.prevent="save">
        <div id="header" class="flex-none">
            <div class="flex h-14 items-center gap-2 px-4 bg-primary dark:bg-navy-700 print:hidden">
                <a class="rounded-md p-1 text-white hover:bg-white/10" href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke="currentColor" fill="none" style="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                </a>
                <div class="flex-grow"></div>
                <div slot="actions" class="flex items-center gap-2">
                    <x-button wire:target="save" label="Save changes" class="btn w-full btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90 font-medium" />
                </div>
            </div>
        </div>
        <div class="flex h-full flex-grow overflow-hidden">
            <style>
                [type='checkbox']:checked{
                    background-image: none;
                }
            </style>
            <div class="flex h-full flex-none border-r duration-200" style="width: 416px;">
                <div class="h-full flex-grow overflow-y-auto ">
                    <div slot="tabs" class="h-full">
                    <div class="flex flex-col gap-4 px-4 pb-6">
                        <div class="flex flex-col gap-0 divide-y">
                            <div class="is-scrollbar-hidden grow overflow-y-auto">
                                <div class="mt-4 flex items-center justify-between px-2">
                                    <span class="text-xs font-semibold uppercase">Case Studies </span>
                                </div>
                                <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                                <div class="mt-5 mx-3">
                                    <x-button wire:target="selectCaseStudies" wire:click="selectCaseStudies" class="w-full btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90" type="button" label="Select Case Studies" />
                                </div>
                                <div class="mt-4 flex items-center justify-between px-2">
                                    <span class="text-xs font-semibold uppercase">Site Details </span>
                                </div>
                                <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                                <div class="mt-5 mx-3">
                                    <x-input 
                                        type="text" 
                                        name="preferences.title"
                                        placeholder="{{ __('Enter title') }}" 
                                        label="{{ __('Title') }}" 
                                        class="px-1" 
                                        labelClass="font-medium text-slate-600 dark:text-navy-100"
                                        wire:model="preferences.title"
                                    >
                                    </x-input>
                                </div>
                                <div class="mt-5 flex items-center justify-between px-2">
                                    <span class="text-xs font-semibold uppercase">BRANDING </span>
                                </div>
                                <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                                <div class="mt-5 mx-3" 
                                    x-data="{ uploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="uploading = true"
                                    x-on:livewire-upload-finish="uploading = false; progress = 0;"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <p class="text-xs pb-3">Favicon</p>
                                    <div class="mt-2 w-full text-left duration-100 hover:opacity-80" @click="$refs.faviconImg.click()">
                                        <div class="flex h-24 flex-col items-center justify-center rounded-lg border border-navy-400 bg-gray-100 px-4 py-4">
                                            @if(is_array($preferences['favicon']) && isset($preferences['favicon'][0]))
                                            <img src="{{ $preferences['favicon'][0]->temporaryUrl() }}" alt="favicon" class="h-full object-contain object-left" />
                                            @else
                                            <img src="{{ getExistingFavicon() }}" alt="logo" class="h-full object-contain object-left" />
                                            @endif
                                            <input wire:model="preferences.favicon" type="file" x-ref="faviconImg" multiple="" accept="image/png,image/jpg,image/gif,image/jpeg,image/webp" autocomplete="off" style="display: none">
                                        </div>
                                    </div>
                                    @error('preferences.favicon')
                                    <p class="text-tiny+ text-error mt-1">{{ $message }}</p>
                                    @enderror
                                    <div x-show="uploading">
                                        <div class="w-full h-2 bg-slate-100 rounded-lg shadow-inner mt-3">
                                            <div class="bg-green-500 h-2 rounded-lg" :style="{ width: `${progress}%` }"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 mx-3" 
                                    x-data="{ uploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="uploading = true"
                                    x-on:livewire-upload-finish="uploading = false; progress = 0;"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <p class="text-xs pb-3">Logo</p>
                                    <div class="mt-2 w-full text-left duration-100 hover:opacity-80" @click="$refs.logoImg.click()">
                                        <div class="flex h-24 flex-col items-center justify-center rounded-lg border border-navy-400 bg-gray-100 px-4 py-4">
                                            @if(is_array($preferences['logo']) && isset($preferences['logo'][0]))
                                            <img src="{{ $preferences['logo'][0]->temporaryUrl() }}" alt="logo" class="h-full object-contain object-left" />
                                            @else
                                            <img src="{{ getExistingLogo() }}" alt="logo" class="h-full object-contain object-left" />
                                            @endif
                                            <input wire:model="preferences.logo" type="file" x-ref="logoImg" multiple="" accept="image/png,image/jpg,image/gif,image/jpeg,image/webp,image/svg+xml" autocomplete="off" style="display: none">
                                        </div>
                                    </div>
                                    @error('preferences.logo')
                                    <p class="text-tiny+ text-error mt-1">{{ $message }}</p>
                                    @enderror
                                    <div x-show="uploading">
                                        <div class="w-full h-2 bg-slate-100 rounded-lg shadow-inner mt-3">
                                            <div class="bg-green-500 h-2 rounded-lg" :style="{ width: `${progress}%` }"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 mx-3">
                                    <div x-data="{range:{{ $preferences['logo_width'] }}}" class="">
                                        <div class="flex justify-between">
                                            <p class="text-xs">Logo Size</p>
                                            <p><span x-text="range" x-ref="logoWidth" class="bg-primary text-white px-1 text-xs rounded-full">100</span></p>
                                        </div>
                                        <label class="block mt-1">
                                            <input x-model="range" @input="updateLogoWidth" wire:model="preferences.logo_width" class="form-range text-primary dark:text-accent" type="range" />
                                        </label>
                                    </div>
                                </div>
            
                                <div class="mt-10 flex items-center justify-between px-2">
                                    <span class="text-xs font-semibold uppercase">HERO COPY </span>
                                </div>
                                <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                                <div class="mt-5 mx-3">
                                    <label class="block">
                                        <x-input 
                                            type="text" 
                                            name="preferences.banner_title_text"
                                            placeholder="{{ __('Enter Hero Banner Title') }}" 
                                            label="{{ __('Hero Banner Title') }}" 
                                            class="" 
                                            labelClass="font-medium text-slate-600 dark:text-navy-100"
                                            wire:model="preferences.banner_title_text"
                                            @input="updateBannerTitle"
                                        >
                                        </x-input>
                                    </label>
                                </div>
                                <div class="mt-5 mx-3">
                                    <label class="block">
                                        <x-input 
                                            type="text" 
                                            name="preferences.banner_subtitle_text"
                                            placeholder="{{ __('Enter Hero Banner Subtitle') }}" 
                                            label="{{ __('Hero Banner Subtitle') }}" 
                                            class="" 
                                            labelClass="font-medium text-slate-600 dark:text-navy-100"
                                            wire:model="preferences.banner_subtitle_text"
                                            @input="updateBannerSubTitle"
                                        >
                                        </x-input>
                                    </label>
                                </div>
                                <div class="flex flex-col p-4" x-data="{ showCTA: true }">
                                    <span class="text-xs">Enable CTA</span>
                                    <div class="mt-2 pb-2">
                                        <label class="inline-flex items-center space-x-2">
                                            <x-switch-toggle
                                                @click="showCTA = !showCTA" 
                                                class="" 
                                                label="" 
                                                name="preferences.show_banner_cta"
                                                wire:model="preferences.show_banner_cta"
                                                x-bind:checked="showCTA"
                                            />
                                        </label>
                                    </div>
                                    <div id="cta-group" x-show="showCTA">
                                        <div class="mx-3">
                                            <label class="block">
                                                <x-input 
                                                    type="text" 
                                                    name="preferences.banner_cta_text"
                                                    placeholder="{{ __('Learn more') }}" 
                                                    label="{{ __('CTA Text') }}" 
                                                    class="" 
                                                    labelClass="font-medium text-slate-600 dark:text-navy-100"
                                                    wire:model="preferences.banner_cta_text"
                                                    @input="updateBannerCTAText"
                                                >
                                                </x-input>
                                            </label>
                                        </div>
                                        <div class="mt-5 mx-3">
                                            <label class="block">
                                                <x-input 
                                                    type="text" 
                                                    name="preferences.banner_cta_link"
                                                    placeholder="{{ __('Paste the URL') }}" 
                                                    label="{{ __('CTA Link') }}" 
                                                    class="" 
                                                    labelClass="font-medium text-slate-600 dark:text-navy-100"
                                                    wire:model="preferences.banner_cta_link"
                                                    @input="updateBannerCTALink"
                                                >
                                                </x-input>
                                            </label>
                                        </div>
                                        <div class="mt-5 mx-3">
                                            <label class="inline-flex items-center space-x-2">
                                                <input 
                                                    type="checkbox"
                                                    class="form-checkbox is-basic h-3.5 w-3.5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                                                    name="preferences.banner_cta_link_target"
                                                    wire:model="preferences.banner_cta_link_target"
                                                    checked="{{ $preferences['banner_cta_link_target'] == 1 ? true : false }}"
                                                    @change="updateBannerCTATarget"
                                                />
                                                <span>Open link in new tab</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
            
                                @livewire('customizer.partials.menu-item', ['items' => $menuItems->menuItems ?? [], 'currentTemplate' => $currentTemplate])
                                
                                <div class="mt-10 flex items-center justify-between px-2">
                                    <span class="text-xs font-semibold uppercase">SEO Details </span>
                                </div>
                                <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                                <div class="mt-5 mx-3">
                                    <label class="block">
                                        <x-input 
                                            type="text" 
                                            name="preferences.meta_title"
                                            placeholder="{{ __('Enter Meta Title') }}" 
                                            label="{{ __('Meta Title') }}" 
                                            class="" 
                                            labelClass="font-medium text-slate-600 dark:text-navy-100"
                                            wire:model="preferences.meta_title"
                                        >
                                        </x-input>
                                    </label>
                                </div>
                                <div class="mt-5 mx-3">
                                    <label class="block">
                                        <x-input 
                                            type="text" 
                                            name="preferences.meta_description"
                                            placeholder="{{ __('Enter Meta Description') }}" 
                                            label="{{ __('Meta Description') }}" 
                                            class="" 
                                            labelClass="font-medium text-slate-600 dark:text-navy-100"
                                            wire:model="preferences.meta_description"
                                        >
                                        </x-input>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow duration-200 bg-gray-100" style="background-image: radial-gradient(rgba(186 183 195) 0.6px, transparent 0.5px);background-size: 10px 10px;">
                <div slot="preview" class="h-full">
                <div class="relative flex h-full w-full flex-none flex-col items-center overflow-hidden overflow-y-scroll"> <iframe id="templateIframe" class="h-full w-full overflow-hidden" src="{{ $currentTemplate }}" allow="microphone; camera" frameborder="0" title="" width="100%" height="100%"></iframe></div>
                </div>
            </div>
            @livewire('customizer.partials.popup')
        </div>
    </form>
</div>

 @push('script')
    <script>

        document.addEventListener('livewire:init', () => {
            Livewire.on('logoUpdated', function (logo) {
                // document.getElementById('templateIframe').contentWindow.postMessage({ type: 'updateLogo', data: favicon }, '{{ $currentTemplate }}');
                var tIframe = document.getElementById('templateIframe');
                var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
                iframeDocument.getElementById('header-logo').src = logo;
            });

            Livewire.on('selectCaseStudiesPopup', function (data) {
                Livewire.dispatch('openModal');
            });

            Livewire.on('fetchCaseStudyData', function (data) {
                var tIframe = document.getElementById('templateIframe');
                var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
                iframeDocument.getElementById('case-studies-wrapper').innerHTML = '';
                iframeDocument.getElementById('case-studies-wrapper').innerHTML = data;
            });
        }); 

        function updateBannerTitle(event) {
            let val = event.target.value;
            var tIframe = document.getElementById('templateIframe');
            // tIframe.contentWindow.postMessage({ type: 'updateBannerTitle', data: val }, '{{ $currentTemplate }}');
            var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
            iframeDocument.getElementById('banner-title').innerText = val;
        }

        function updateBannerSubTitle(event) {
            let val = event.target.value;
            // @this.set('name', newTitle);
            // document.getElementById('templateIframe').contentDocument.querySelector('#title').innerText = newTitle;
            var tIframe = document.getElementById('templateIframe');
            // tIframe.contentWindow.postMessage({ type: 'updateBannerSubTitle', data: val }, '{{ $currentTemplate }}');
            var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
            iframeDocument.getElementById('banner-subtitle').innerText = val;
        }

        function updateBannerCTAText(event) {
            let val = event.target.value;
            // @this.set('name', newTitle);
            // document.getElementById('templateIframe').contentDocument.querySelector('#title').innerText = newTitle;
            var tIframe = document.getElementById('templateIframe');
            // tIframe.contentWindow.postMessage({ type: 'updateBannerCTAText', data: val }, '{{ $currentTemplate }}');
            var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
            iframeDocument.getElementById('banner-cta').innerText = val;
        }

        function updateBannerCTALink(event) {
            let val = event.target.value;
            // @this.set('name', newTitle);
            // document.getElementById('templateIframe').contentDocument.querySelector('#title').innerText = newTitle;
            var tIframe = document.getElementById('templateIframe');
            // tIframe.contentWindow.postMessage({ type: 'updateBannerCTALink', data: val }, '{{ $currentTemplate }}');
            var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
            iframeDocument.getElementById('banner-cta').setAttribute('href', val);
        }

        function updateBannerCTATarget(event) {
            let val = event.target.checked ? '_blank' : '_self';
            // @this.set('name', newTitle);
            // document.getElementById('templateIframe').contentDocument.querySelector('#title').innerText = newTitle;
            var tIframe = document.getElementById('templateIframe');
            // tIframe.contentWindow.postMessage({ type: 'updateBannerCTATarget', data: val }, '{{ $currentTemplate }}');
            var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
            iframeDocument.getElementById('banner-cta').setAttribute('target', val);
        }

        function updateLogoWidth(event) {
            let val = event.target.value;
            var tIframe = document.getElementById('templateIframe');
            var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
            iframeDocument.getElementById('header-logo').style.width = val+'%';
            // tIframe.contentWindow.postMessage({ type: 'updateLogoWidth', data: val+'%' }, '{{ $currentTemplate }}');
        }

        // function selectedFavicon(event) {
        //     let newFavicon = URL.createObjectURL(event.target.files[0]);
        //     var tIframe = document.getElementById('templateIframe');
        //     tIframe.contentWindow.postMessage({ type: 'updateMessage', data: newFavicon }, '{{ $currentTemplate }}');
        // }
        

    </script>
@endpush