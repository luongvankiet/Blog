@component('mail::message')
# Change password

Click on button below to change your password

@component('mail::button', ['url' => 'http://localhost:4200/reset-password?token='.$token])
Reset password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
