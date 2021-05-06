@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{-- Whotostaff Request --}}
            {{-- /storage/whotostafflogo2.png --}}
            <img style="left: 50%; right: 50% ;" src="<?php echo url('http://wh454994.ispot.cc//iverifyapi/ivfull.png'); ?>" />

        @endcomponent
    @endslot
{{-- Body --}}
    {{-- This is our main message {{ $user }}

   --}}
   Hello There,

   Please click on the link to verify your email
   Your username is: {{$email}}
   Your password is: {{$password}}
   Your url is: {{$url}}
   Please reset your password after login

   @component('mail::button', ['url' => $url, 'color' => 'success'])
   Verify Email
   @endcomponent


   Thank you for using I-verify!

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
