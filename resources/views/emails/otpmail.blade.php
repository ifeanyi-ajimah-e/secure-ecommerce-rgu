@component('mail::message')
# Introduction

Your OTP is {{ $OTP }}

@component('mail::button', ['url' => ''])
Visit page.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
