@props(['class', 'name', 'existingFiles'])
<style>
    .filepond--root{
        margin-bottom: 0.2rem
    }
</style>
@php
// $existingFiles = str_replace('&quot;', '"', $existingFiles);
// $existingFiles = json_decode($existingFiles)
@endphp
<div class="filepond fp-grid fp-bordered [--fp-grid:1] {{ $class ?? '' }}" wire:ignore>
    <input
        type="file" 
        name="{{ $name }}"
        x-init="$el._x_filepond = FilePond.create($el);
        $el._x_filepond.setOptions({
            AllowMultiple: {{ $attributes->has('multiple') ? 'true' : 'false' }},
            allowFileTypeValidation: {{ $attributes->has('allowFileTypeValidation') ? 'true' : 'false' }},
            acceptedFileTypes: {!! $attributes->get('acceptedFileTypes') ?? 'null' !!},
            allowFileSizeValidation: {{ $attributes->has('allowFileSizeValidation') ? 'true' : 'false' }},
            maxFileSize: {!! $attributes->has('maxFileSize') ? "'".$attributes->get('maxFileSize')."'" : 'null' !!},
            onaddfilestart: function(file) { submitButtonDisabled = true },
            onprocessfiles: function() { submitButtonDisabled = false },
            onupdatefiles: function (files) {
                fileStatus = true;
                files.forEach(function (file) {
                    if(file.status != 5) fileStatus = false;
                });
                if(fileStatus) submitButtonDisabled = false;
            },
            server: {
                load: (source, load, error, progress, abort, headers) => {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
                process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, (event) => {
                        progress(event.detail.progress, event.detail.progress, 100);
                    })
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
                },
            },
            {{-- @if($existingFiles)
                files: [
                    @foreach($existingFiles as $file)
                    {
                        source: '{{ $file->original_url }}',

                        options: {
                            type: 'local',
                        },
                    }
                    @endforeach
                ],
                onremovefile: (error, file) => {
                    @this.set('{{ $attributes['wire:model'] }}', null);
                },
            @endif --}}
            @if($existingFiles)
                files: [
                    {
                        source: '{{ $existingFiles }}',

                        options: {
                            type: 'local',
                        },
                    }
                ],
                onremovefile: (error, file) => {
                    @this.set('{{ $attributes['wire:model'] }}', null);
                },
            @endif
        });"
        {{ $attributes }}
     />
</div>
@error($name)
<p class="text-tiny+ text-error mt-1">{{ $message }}</p>
@enderror