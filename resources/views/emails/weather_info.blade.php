@component('mail::message')
    # Приветствуем Вас, {{$name}}!
    {{date("H:i", $weather['now'] + $weather['info']['tzinfo']['offset'])}} в Москве погода {{$weather['fact']['temp']}}℃
@endcomponent
