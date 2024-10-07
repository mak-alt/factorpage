<main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="{ general: true, seo: false, submitButtonDisabled: false }">
    <form wire:submit.prevent="save">
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
            {{ __('Edit ') .Str::limit($caseStudy->name,150) }}
          </h2>
        </div>
        <div class="flex justify-center space-x-2">
          <x-button
            class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
            label="Preview"
          >
          </x-button>
          <x-primary-button
            class="inline-flex items-center"
            label="{{ __('Save') }}"
            wire:target="save"
          >
          </x-primary-button>
        </div>
      </div>
      <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 lg:col-span-8">
            <div class="card">
              <div class="tabs flex flex-col">
                <div class="is-scrollbar-hidden overflow-x-auto">
                  <div class="border-b-2 border-slate-150 dark:border-navy-500">
                    <div class="tabs-list -mb-0.5 flex">
                      <button
                        type="button"
                        class="btn h-14 shrink-0 space-x-2 rounded-none border-b-2 px-4 font-medium sm:px-5"
                        @click="general = true; seo = false"
                        x-bind:class="general === true ? 'border-primary  text-primary dark:border-accent dark:text-accent-light' : 'border-transparent'"
                        >
                        <i class="fa-solid fa-layer-group text-base"></i>
                        <span>{{ __('General') }}</span>
                      </button>
                      <button
                        type="button"
                        class="btn h-14 shrink-0 space-x-2 rounded-none border-b-2 px-4 font-medium sm:px-5"
                        @click="general = false; seo = true"
                        x-bind:class="seo === true ? 'border-primary  text-primary dark:border-accent dark:text-accent-light' : 'border-transparent'"
                      >
                        <i class="fa-solid fa-tags text-base"></i>
                        <span>{{ __('SEO Details') }}</span>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="tab-content p-4 sm:p-5" x-show="general">
                  <div class="space-y-5">
                      <x-input 
                          type="text" 
                          wire:model="form.name" 
                          name="form.name"
                          placeholder="{{ __('Enter title') }}" 
                          label="{{ __('Title') }}" 
                          class="" 
                          labelClass="font-medium text-slate-600 dark:text-navy-100"
                      >
                      </x-input>
                      <x-input 
                          type="text" 
                          wire:model="form.slug"
                          name="form.slug"
                          placeholder="{{ __('Enter slug') }}" 
                          label="{{ __('Slug') }}" 
                          class="" 
                          labelClass="font-medium text-slate-600 dark:text-navy-100"
                          onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '-').replace(/-+/g, '-').replace(/\s+/g, '-').toLowerCase()"
                      >
                      </x-input>
                    <div>
                      <span
                        class="font-medium text-slate-600 dark:text-navy-100"
                        >{{ __('Content') }}</span
                      >
                      <div class="mt-1.5 w-full" wire:ignore>
                        <div
                          wire:model="form.content"
                          name="form.content"
                          class="h-48"
                          x-data
                          x-init="$el._x_quill = new Quill($el,{
                            modules : {
                              toolbar: [
                                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                                ['blockquote', 'code-block'],
                                [{ header: 1 }, { header: 2 }], // custom button values
                                [{ list: 'ordered' }, { list: 'bullet' }],
                                [{ script: 'sub' }, { script: 'super' }], // superscript/subscript
                                [{ indent: '-1' }, { indent: '+1' }], // outdent/indent
                                [{ direction: 'rtl' }], // text direction
                                [{ size: ['small', false, 'large', 'huge'] }], // custom dropdown
                                [{ header: [1, 2, 3, 4, 5, 6, false] }],
                                [{ color: [] }, { background: [] }], // dropdown with defaults from theme
                                [{ font: [] }],
                                [{ align: [] }],
                                [ 'link', 'image', 'video', 'formula' ], 
                                ['clean'], // remove formatting button
                              ],
                            },
                            placeholder: 'Enter your content...',
                            theme: 'snow',
                          });
                          $el._x_quill.on('text-change', function () {
                            $dispatch('input', $el._x_quill.root.innerHTML);
                            @this.set('', $el._x_quill.root.innerHTML);
                          });"
                        >{!! $caseStudy->content !!}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-content p-4 sm:p-5" x-show="seo">
                  <div class="space-y-5">
                      <x-input 
                          type="text" 
                          name="form.meta_title" 
                          wire:model="form.meta_title"
                          placeholder="{{ __('Enter meta title') }}" 
                          label="{{ __('Meta Title') }}" 
                          class="" 
                          labelClass="font-medium text-slate-600 dark:text-navy-100"
                      >
                      </x-input>
                      <x-input 
                          type="text" 
                          name="form.meta_description" 
                          wire:model="form.meta_description"
                          placeholder="{{ __('Enter meta description') }}" 
                          label="{{ __('Meta Description') }}" 
                          class="" 
                          labelClass="font-medium text-slate-600 dark:text-navy-100"
                      >
                      </x-input>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-12 lg:col-span-4">
            <div class="card space-y-5 p-4 sm:p-5">
              <x-select labelClass="font-medium text-slate-600 dark:text-navy-100" wire:model="form.status" name="form.status" label="Status">
                <option value="active">Publish</option>
                <option value="inactive">Draft</option>
              </x-select>
              {{-- <label>
                  <span class="font-medium text-slate-600 dark:text-navy-100"
                    >{{ __('Publish Date') }}</span
                  >
                  <x-date-picker wire:model="form.publish_date"  name="form.publish_date" placeholder="{{ __('Choose date...') }}" value=""></x-date-picker>
              </label> --}}
            </div>
            <div class="card space-y-5 p-4 sm:p-5 mt-4">
              <div>
                <span
                  class="font-medium text-slate-600 dark:text-navy-100"
                  >{{ __('Featured Image') }}</span
                >
                <x-filepond wire:model="form.image" name="form.image" existingFiles="{{ $caseStudy->photo }}" allowFileTypeValidation acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']" allowFileSizeValidation maxFileSize="5000000"  class="relative mt-1.5"></x-filepond>
              </div>
            </div>
          </div>
      </div>
    </form>
  </main>