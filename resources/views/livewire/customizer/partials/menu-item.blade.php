<div>
    <div class="mt-10 flex items-center justify-between px-2">
        <span class="text-xs font-semibold uppercase">Navigation </span>
    </div>
    <div class="my-1 mx-2 h-px bg-slate-200 dark:bg-navy-500"></div>
    <div class="mt-5 mx-3">
        <div class="flex items-center justify-between">
            <div class="block text-xs font-medium text-gray-500">
                <div class="flex items-center gap-2">
                    <span> </span>
                    <div></div>
                </div>
                Header Links
            </div>
            <button type="button" wire:click="addItem" id="clone-menu-item" class="rounded-md bg-slate-200 p-1">
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
            @foreach($items as $index => $item)
            @php
            $item = (object) $item;
            @endphp
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
                        <x-input 
                            type="text" 
                            name="items.{{ $index }}.name"
                            placeholder="{{ __('Label') }}" 
                            label="" 
                            class="" 
                            labelClass="font-medium text-slate-600 dark:text-navy-100"
                            wire:model.lazy="items.{{ $index }}.name"
                            value="{{ $item->name ?? '' }}"
                        >
                        </x-input>
                    </div>
                    <div class="mx-1">
                        <x-input 
                            type="text" 
                            name="items.{{ $index }}.link"
                            placeholder="{{ __('Url') }}" 
                            label="" 
                            class="" 
                            labelClass="font-medium text-slate-600 dark:text-navy-100"
                            wire:model.lazy="items.{{ $index }}.link"
                            value="{{ $item->link ?? '' }}"
                        >
                        </x-input>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-center gap-2">
                            <label class="inline-flex items-center space-x-2">
                                <input 
                                    type="checkbox"
                                    class="form-checkbox is-basic h-3.5 w-3.5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                                    name="items.{{ $index }}.target"
                                    wire:model.lazy="items.{{ $index }}.target"
                                    x-bind:checked="{{ $item->target == 1 ? 'true' : 'false' }}"
                                />
                                <span>Open link in new tab</span>
                            </label>
                            <div class="flex-grow">
                                <button wire:click="removeItem({{ $index }})" id="hide-menu" type="button">
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
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@push('script')
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('menuDataUpdated', function (updatedItems) {
            // document.getElementById('templateIframe').contentWindow.postMessage({ type: 'updateMenuItems', data: updatedItems }, '{{ $currentTemplate }}');
            var tIframe = document.getElementById('templateIframe');

            if (tIframe.contentWindow.document && tIframe.contentDocument && tIframe.contentDocument.readyState === 'complete') {
                var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
                if(iframeDocument.getElementById('navbarCollapse') == null){
                    return false;
                }
                var ulDom = iframeDocument.getElementById('navbarCollapse').querySelector('ul');
                ulDom.innerHTML = '';
                updatedItems[0].forEach(element => {
                    // Create the <a> element
                    var a = document.createElement('a');
                    a.href = element.link;
                    a.target = element.target == 1 ? '_blank' : '_self';
                    a.className = 'ud-menu-scroll mx-8 flex py-2 text-base font-medium text-dark group-hover:text-primary dark:text-white lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70';
                    a.textContent = element.name;
                    
                    // Create the <li> element
                    var li = document.createElement('li');
                    li.className = 'group relative';
                    li.appendChild(a);

                    ulDom.appendChild(li);
                });

                return false;
            }
            
            tIframe.onload = function() {
                var iframeDocument = tIframe.contentDocument || tIframe.contentWindow.document;
                var ulDom = iframeDocument.getElementById('navbarCollapse').querySelector('ul');
                ulDom.innerHTML = '';
                updatedItems[0].forEach(element => {
                    // Create the <a> element
                    var a = document.createElement('a');
                    a.href = element.link;
                    a.target = element.target == 1 ? '_blank' : '_self';
                    a.className = 'ud-menu-scroll mx-8 flex py-2 text-base font-medium text-dark group-hover:text-primary dark:text-white lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70';
                    a.textContent = element.name;
                    
                    // Create the <li> element
                    var li = document.createElement('li');
                    li.className = 'group relative';
                    li.appendChild(a);

                    ulDom.appendChild(li);
                });
            }
        });
    });

</script>
@endpush
