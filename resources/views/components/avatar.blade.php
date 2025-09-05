@props(['employer', 'width' => 80])

@php
    // $isFactoryAvatar = Str::startsWith($employer->avatar, ['http://', 'https://']);

    // $avatarPath = $isFactoryAvatar
    //     ? $employer->user->avatar
    //     : asset('storage/' . $employer->user->avatar);

    $avatarPath = str_starts_with($employer->user?->avatar ?? '', 'https')
    ? $employer->user->avatar
    : asset('storage/' . $employer->user->avatar);
@endphp

<img src="{{ $avatarPath }}" alt="avatar" class="rounded-full object-cover"
    style="width: {{ $width }}px; height: {{ $width }}px;">
