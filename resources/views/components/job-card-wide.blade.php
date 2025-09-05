@props(['job'])

<x-panel class="flex items-center gap-x-6 relative">


    @if ($job->featured)
        <span class="absolute top-0 right-0 bg-red-900 text-white text-xs font-bold px-3 py-1 rounded-bl-xl rounded-tr-xl">
            Hot Job 🔥
        </span>
    @endif

    <div class="flex-shrink-0 self-start">
        <x-avatar :employer="$job->employer" class="w-14 h-14 rounded-xl" />
    </div>
    <div class="flex-1 flex flex-col">
        <a href="#" class="text-sm text-gray-400">{{ $job->employer->name }}</a>

        <h3 class="font-bold text-xl mt-1 group-hover:text-blue-800 transition-colors duration-300">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>
        <div class="flex justify-between">
            <p class="text-sm text-gray-500 mt-2">{{ $job->schedule }} - {{ $job->salary }}</p>
            <div class="flex flex-col">
                <p class="text-sm text-gray-500 mt-2"><span class="space-x-1">Published -</span>
                    {{ date('d/m/Y', strtotime($job->created_at)) }}</p>
                <p class="text-sm font-bold text-white-10 mt-2"><span class="space-x-1">Last Date -</span>
                    {{ date('d/m/Y', strtotime($job->expired_at)) }}</p>
            </div>
        </div>

        <div class="flex flex-wrap gap-2 mt-3">
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>
        <div class="w-full">
            <form method="POST" action="" class="w-full flex mt-2 justify-end">
                @csrf
                <x-forms.button class="cursor-pointer">Apply</x-forms.button>
                {{-- <x-forms.button
                    class="{{ !now()->greaterThan($job->expired_at) ? 'cursor-pointer' : 'disable opacity-70 pointer-events-none' }}">Apply
                </x-forms.button> --}}
            </form>
        </div>
    </div>

</x-panel>
