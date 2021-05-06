@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{-- Whotostaff Request --}}
            {{-- /storage/whotostafflogo2.png --}}
            <img style="left: 50%; right: 50% ;" src="<?php echo url('/svg/musicbridgelogo.png'); ?>" />

        @endcomponent
    @endslot
{{-- Body --}}
    {{-- This is our main message {{ $user }}

   --}}
   Hello {{$name}},


   Welcome to Music Bridge a place where song writers, producers and Artistes connect to make beauful sounds.
   Your account was created successfully, kindly proceed to login to explore the app.


   Thank you for using Music Bridge!

   Regards,


   Music Bridge Team.






{{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset
{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
        © {{ date('Y') }} {{ config('Music Brigbe App') }} Music Bridge App
        @endcomponent
    @endslot
@endcomponent
