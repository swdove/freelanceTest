@component('mail::message')
# Introduction

The body of your message.
 
-one
-two
-three

@component('mail::button', ['url' => 'www.google.com'])
Button Text
@endcomponent

@component('mail::panel', ['url' => ''])
Lorem ipsum.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
