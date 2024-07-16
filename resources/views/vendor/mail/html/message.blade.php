<x-mail::layout style="background-color: white;">
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
{{ config('app.name') }}
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
   <x-mail::subcopy>
       {{ $subcopy }}
   </x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer >
<p style="color: black;">© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')</p>
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
