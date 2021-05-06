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
   Hello {{$user}},

   We got your request to change details of <h5 style="font-weight: bold"> {{$request->staffname}} </h5>
   We will get back to your in a few minutes

   Thank you for using our Whotostaff!

   Regards,

   I-Verify Team.

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
