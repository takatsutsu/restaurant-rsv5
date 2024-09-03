@component('mail::message')
# {{ $shopName }} さんからのご案内

## 件名: {{ $subject }}

{{ $messageContent }}

@endcomponent