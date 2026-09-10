@props(['variant' => 'dark', 'class' => 'h-10'])

<img src="{{ asset($variant === 'light' ? 'images/logo-light.png' : 'images/logo.png') }}"
     srcset="{{ asset($variant === 'light' ? 'images/logo-light.png' : 'images/logo.png') }} 1x,
             {{ asset($variant === 'light' ? 'images/logo-light@2x.png' : 'images/logo@2x.png') }} 2x"
     alt="Spoorwegen Veldonia"
     {{ $attributes->merge(['class' => $class . ' w-auto']) }}>
