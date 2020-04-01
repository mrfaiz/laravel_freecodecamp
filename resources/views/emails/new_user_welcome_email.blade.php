@component('mail::message')
# Welcome to {{ config('app.name') }} !

Hi,
Thanks for being a member of our site.


@component('mail::button', ['url' => '/login'])
Button Text
@endcomponent

Thanks,<br>
Faiz Ahmed
@endcomponent
