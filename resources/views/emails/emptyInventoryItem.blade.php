@component('mail::message')
Hi!

Your inventory is running low.

{{ $product }}
Product:
Title: {{ $product->title }}
Brand Name: {{ $product->brand_name }}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
