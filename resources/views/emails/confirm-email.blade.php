@component('mail::message')
# Introduction

Please confirm your email address, asshole.

@component('mail::button', ['url' => url('/register/confirm?token=' . $user->confirmation_token )])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
