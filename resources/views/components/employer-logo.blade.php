@props(['employer', 'width' => 80])

@php
    
    $isFactoryLogo = Str::startsWith($employer->logo, ['http://', 'https://']);

    $logoPath = $isFactoryLogo
        ? $employer->logo
        : asset('storage/' . $employer->logo);
@endphp

<img src="{{ $logoPath }}" alt="Employer Logo" class="rounded-full object-cover" style="width: {{ $width }}px; height: {{ $width }}px;">