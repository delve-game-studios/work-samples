@component('mail::message')
# Activate Your Account

Click on the link below to activate your account.

@component('mail::button', ['url' => url()->signedRoute('activate', ['id' => $user->id, 'email' => $user->email])])
    Activate account
@endcomponent

@endcomponent
