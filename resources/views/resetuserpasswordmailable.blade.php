@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{-- Whotostaff Request --}}
            <img style="left: 50%; right: 50% ;" src="<?php echo url('http://wh454994.ispot.cc//iverifyapi/ivfull.png'); ?>" />

        @endcomponent
    @endslot
{{-- Body --}}
    {{-- This is our main message {{ $user }}

   --}}
   Hello {{$username}},

   We got your request to reset your password
   Below is your password:
   >>>>>>>>>>>>>>>>>>>>
   {{$password}}
   >>>>>>>>>>>>>>>>>>

   Thank you for using our I-verify!

   Regards,

   I-verify Team.

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
        © {{ date('Y') }} {{ config('I-Verify Team') }}. I-verifyauthentication.com
        @endcomponent
    @endslot
@endcomponent
