@props(['job'])
@if ($job->featured)

    <x-panel class="flex gap-x-6 relative border-2 border-yellow-400">
        <div>
            <span class="absolute top-0 right-0 bg-yellow-400 text-white text-xs font-bold px-3 py-1 rounded-bl-xl">
                Featured
            </span>
    
            <div>
                <x-employer-logo :employer="$job->employer" />
            </div>
        </div>

        <div class="flex-1 flex flex-col>
            <a href="#" class="self-start text-sm text-gray-400">{{ $job->employer->name }}</a>
            <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">
                <a href="{{ $job->url }}" target="_blank">
                    {{ $job->title }}
                </a>
            </h3>
            <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - {{ $job->salary }}</p>
        </div>

        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>

    </x-panel>
@else
    
    <x-panel class="flex gap-x-6">

        <div>
            <x-employer-logo :employer="$job->employer" />
        </div>

        <div class="flex-1 flex flex-col">
            <a href="#" class="self-start text-sm text-gray-400">{{ $job->employer->name }}</a>
            <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">
                <a href="{{ $job->url }}" target="_blank">
                    {{ $job->title }}
                </a>
            </h3>
            <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - {{ $job->salary }}</p>
        </div>

        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>

    </x-panel>
@endif
