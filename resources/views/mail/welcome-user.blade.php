<x-mail::message>
# Introduction

Dear {{ $user->name }},
Welcome to {{ config('app.name') }}

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
