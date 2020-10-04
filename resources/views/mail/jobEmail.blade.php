@component('mail::message')

Hi, {{ $data['friend_name'] }}, {{ $data['your_name'] }}({{  }})

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
