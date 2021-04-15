@component('mail::message')
    # {{ $data['title'] }}

    { $data['message'] }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
