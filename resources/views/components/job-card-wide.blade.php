@props(['job'])

<x-panel class="flex items-center gap-x-6 relative">

    {{-- Featured Badge --}}
    @if ($job->featured)
        <span class="absolute top-0 right-0 bg-yellow-400 text-white text-xs font-bold px-3 py-1 rounded-bl-xl">
            Featured
        </span>
    @endif

    {{-- Employer Logo --}}
    <div class="flex-shrink-0 self-start">
        <x-employer-logo :employer="$job->employer" class="w-14 h-14 rounded-xl" />
    </div>

    {{-- Job Info --}}
    <div class="flex-1 flex flex-col">
        {{-- Employer Name --}}
        <a href="#" class="text-sm text-gray-400">{{ $job->employer->name }}</a>

        {{-- Job Title --}}
        <h3 class="font-bold text-xl mt-1 group-hover:text-blue-800 transition-colors duration-300">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>

        {{-- Schedule + Salary --}}
        <p class="text-sm text-gray-500 mt-2">{{ $job->schedule }} - {{ $job->salary }}</p>

        {{-- Tags --}}
        <div class="flex flex-wrap gap-2 mt-3">
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>
    </div>

</x-panel>
