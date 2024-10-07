<div class="flex h-full flex-none border-r duration-200" style="width: 416px;">
    <div class="h-full flex-grow overflow-y-auto ">
        <div slot="tabs" class="h-full">
        <div class="flex flex-col gap-4 px-4 pb-6">
            <div class="flex flex-col gap-0 divide-y">
                <div class="is-scrollbar-hidden grow overflow-y-auto">
                    <div class="mt-4 flex items-center justify-between px-2">
                        <span class="text-xs font-semibold uppercase">Site Details </span>
                    </div>
                    <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="mt-5 mx-3">
                        <x-input 
                            type="text" 
                            name="name"
                            placeholder="{{ __('Enter title') }}" 
                            label="{{ __('Title') }}" 
                            class="" 
                            labelClass="font-medium text-slate-600 dark:text-navy-100"
                            wire:model="name" 
                        >
                        </x-input>
                        <p>{{ $name }}</p>
                    </div>
                    <div class="mt-5 flex items-center justify-between px-2">
                        <span class="text-xs font-semibold uppercase">BRANDING </span>
                    </div>
                    <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="mt-5 mx-3">
                        <p class="text-xs pb-3">Favicon</p>
                        <div class="filepond fp-bordered label-icon w-full">
                            <input
                                type="file"
                                x-init="$el._x_filepond = FilePond.create($el,{
                        stylePanelAspectRatio: '2:1',
                        stylePanelLayout: 'compact rounded-md',
                        labelIdle: `<svg xmlns='http://www.w3.org/2000/svg' class='h-8 w-8 mt-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                          <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12'/>
                        </svg>`
                      })"
                                accept="image/png, image/jpeg, image/gif"
                            />
                        </div>
                    </div>
                    <div class="mt-5 mx-3">
                        <p class="text-xs pb-3">Logo</p>
                        <div class="filepond fp-bordered label-icon w-full">
                            <input
                                type="file"
                                x-init="$el._x_filepond = FilePond.create($el,{
                        stylePanelAspectRatio: '2:1',
                        stylePanelLayout: 'compact rounded-md',
                        labelIdle: `<svg xmlns='http://www.w3.org/2000/svg' class='h-8 w-8 mt-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                          <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12'/>
                        </svg>`
                      })"
                                accept="image/png, image/jpeg, image/gif"
                            />
                        </div>
                    </div>
                    <div class="mt-5 mx-3">
                        <div x-data="{range:20}" class="">
                            <div class="flex justify-between">
                                <p class="text-xs">Logo Size</p>
                                <p><span x-text="range" class="bg-primary text-white px-1 text-xs rounded-full">20</span></p>
                            </div>
                            <label class="block mt-1">
                                <input x-model="range" class="form-range text-primary dark:text-accent" type="range" />
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col p-1 border rounded-md mx-2 mt-5 dark:border-navy-400 dark:hover:border-navy-400 dark:focus:border-accent">
                        <div class="mt-1 mx-2">
                            <label class="inline-flex items-center space-x-2 justify-between">
                                <input
                                    class="form-switch h-10 w-10 rounded-full bg-slate-300 before:rounded-md before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"
                                    type="color"
                                    value="#fff"
                                />
                                <span class="text-xs">Primary Color</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-col p-1 border rounded-md mx-2 mt-5 dark:border-navy-400 dark:hover:border-navy-400 dark:focus:border-accent">
                        <div class="mt-1 mx-2">
                            <label class="inline-flex items-center space-x-2 justify-between">
                                <input
                                    class="form-switch h-10 w-10 rounded-full bg-slate-300 before:rounded-md before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"
                                    type="color"
                                    value="#fda600"
                                />
                                <span class="text-xs">Secondary Color</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-10 flex items-center justify-between px-2">
                        <span class="text-xs font-semibold uppercase">HERO COPY </span>
                    </div>
                    <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="mt-5 mx-3">
                        <label class="block">
                            <span class="text-xs">Hero Title</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent text-xs"
                                placeholder="Tenant Fashion"
                                type="text"
                            />
                        </label>
                    </div>
                    <div class="mt-5 mx-3">
                        <label class="block">
                            <span class="text-xs">Hero Sub Title</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent text-xs"
                                placeholder="See what our customers are saying about us"
                                type="text"
                            />
                        </label>
                    </div>
                    <div class="mt-5 mx-3">
                        <span class="text-xs">Hero Description</span>
                        <label class="block mt-1.5">
                            <textarea
                                rows="4"
                                placeholder="Write something"
                                class="text-xs form-textarea w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            ></textarea>
                        </label>
                    </div>
                    <div class="flex flex-col p-4">
                        <span class="text-xs">Enable CTA</span>
                        <div class="mt-2 pb-2">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    id="chk_menu_cta"
                                    class="form-switch h-5 w-10 rounded-lg bg-slate-300 before:rounded-md before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"
                                    type="checkbox"
                                />
                            </label>
                        </div>
                    </div>

                    <div id="cta-group" style="display: none;">
                        <div class="mx-3">
                            <label class="block">
                                <span class="text-xs">CTA Text</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent text-xs"
                                    placeholder="Learn More"
                                    type="text"
                                />
                            </label>
                        </div>
                        <div class="mt-5 mx-3">
                            <label class="block">
                                <span class="text-xs">CTA Link</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent text-xs"
                                    placeholder="Paste the Url"
                                    type="text"
                                />
                            </label>
                        </div>
                    </div>

                    <div class="mt-10 flex items-center justify-between px-2">
                        <span class="text-xs font-semibold uppercase">Navigation </span>
                    </div>
                    <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="mt-5 mx-3">
                        <label class="block">
                            <span class="text-xs">Home Links:</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent text-xs"
                                placeholder="ex. https://tenant.com"
                                type="text"
                            />
                        </label>
                        <p class="text-xs mt-1.5 text-navy-100">Add a link back to your home page</p>
                    </div>

                    <div class="mt-5 mx-3">
                        <div class="flex items-center justify-between">
                            <div class="block text-xs font-medium text-gray-500">
                                <div class="flex items-center gap-2">
                                    <span> </span>
                                    <div></div>
                                </div>
                                Header Links
                            </div>
                            <button id="clone-menu-item" class="rounded-md bg-slate-200 p-1">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    fill="none"
                                    style=""
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="text-primary"
                                >
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-2">
                            <div class="flex flex-col gap-4" aria-disabled="false" role="list" aria-describedby="dnd-zone-active" tabindex="0" style="">
                                <div
                                    class="rounded-lg border bg-white px-2 pt-2 pb-3 focus:outline-none focus:ring-0 mt-3 dark:bg-navy-800 dark:border-navy-400 dark:hover:border-navy-400 dark:focus:border-accent"
                                    draggable="false"
                                    style="user-select: none; cursor: grab;"
                                    tabindex="0"
                                    role="listitem"
                                    id="add-menu-item"
                                >
                                    <div class="mx-1">
                                        <input
                                            class="form-input w-full rounded-md border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent text-xs"
                                            placeholder="Label"
                                            type="text"
                                        />
                                    </div>
                                    <div class="mx-1">
                                        <input
                                            class="form-input mt-1.5 w-full rounded-md border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent text-xs"
                                            placeholder="Url"
                                            type="text"
                                        />
                                    </div>
                                    <div class="mt-2">
                                        <div class="flex items-center gap-2">
                                            <input
                                                name="open_new_link"
                                                id="open_new_link"
                                                type="checkbox"
                                                class="checked:bg-primary checked:focus:bg-primary-400 hover:checked:bg-primary-400 block flex-none appearance-none rounded-md border bg-contain bg-center bg-no-repeat text-sm shadow-sm focus:outline-none focus:ring-0 focus:ring-transparent disabled:cursor-not-allowed"
                                            />
                                            <div class="flex-grow">
                                                <label for="open_new_link_label" class="block text-sm text-slate-400">
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-xs">Open in new tab </span>
                                                        <div>
                                                            <div class="flex flex-col gap-2">
                                                                <button id="hide-menu" type="button">
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="16"
                                                                        height="16"
                                                                        viewBox="0 0 24 24"
                                                                        stroke="currentColor"
                                                                        fill="none"
                                                                        style=""
                                                                        stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        class=""
                                                                    >
                                                                        <path d="M3 6h18"></path>
                                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="append-item p-0 m-0"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col p-4">
                        <div class="mt-2 pb-2">
                            <label class="inline-flex items-center space-x-2 justify-between">
                                <span class="text-xs">Center Navigation</span>
                                <input
                                    class="form-switch h-5 w-10 rounded-lg bg-slate-300 before:rounded-md before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"
                                    type="checkbox"
                                />
                            </label>
                        </div>
                    </div>

                    <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="flex flex-col p-4">
                        <div class="flex items-center justify-between">
                            <a
                                href="#"
                                class="text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70"
                            >
                                Remove Tennat Branding
                            </a>
                        </div>
                        <div class="mt-2 pb-2">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-switch h-5 w-10 rounded-lg bg-slate-300 before:rounded-md before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"
                                    type="checkbox"
                                />
                                <span>Show Tenant Branding</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>