@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@if(is_array($introLines) && count($introLines) > 0)
@foreach ($introLines as $line)
{{ $line }}

@endforeach
@endif

{{-- Action Button --}}
@if($action->present)
<?php
    switch ($level) {
        case 'success':
        case 'error':
        case 'danger':
        case 'warning':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $action->url, 'color' => $color])
{{ $actionText }}
@endcomponent
@endif

{{-- Outro Lines --}}
@if(is_array($outroLines) && count($outroLines) > 0)
@foreach ($outroLines as $line)
{{ $line }}

@endforeach
@endif

{{-- Salutation --}}
@if (! empty($salutation))
{!! $salutation !!}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@if($action->present)
@slot('subcopy')
@lang(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser: [:displayableActionUrl](:actionURL)',
    [
        'actionText' => $action->text,
        'actionURL' => $action->url,
        'displayableActionUrl' => $action->display,
    ]
)
@endslot
@endif
@endcomponent
