@props(['job'])

<x-panel class="flex flex-col text-center self-start min-h-[375px]">
    <div class="flex items-center justify-between w-full">
        <div class="self-start text-sm">{{ $job->employer->name }}</div>
        <x-employer-logo :employer="$job->employer" :width="50" :employer="$job->employer" />
    </div>

    <div class="py-4">
        <h3
            class="group-hover:text-blue-800 text-xl font-bold transiotion-colors duration-300 pb-2 border-b border-white/10">
            <a href=" {{ $job->url }}" target="_blank">
                {{ $job->title }}</a>
        </h3>
        <p class="text-sm mt-2">{{$job->schedule}} - {{ $job->salary }}</p>
        <p class="text-sm">Published: {{ date('d-m-Y', strtotime($job->created_at)) }}</p>
       <p class="text-sm pb-2 border-b border-white/10">
    @if (now()->greaterThan($job->expiry))
        <span class="text-red-500 font-bold">
            This job is no longer available.
        </span>
    @else
        Last Date: <span class="text-blue-200">{{ date('d-m-Y',strtotime($job->expiry)) }}</span>
    @endif
</p>
    </div>

    <div class=" flex justify-center items-center flex-wrap gap-1 pb-2 border-b border-white/10">
        {{-- Limit to 6 tags, show "see more" if more than 6 --}}
        @foreach ($job->tags as $index => $tag)
            <x-tag size="small" :$tag :class="$index > 6 ? 'hidden extra-tag-'.$job->id : ''" />
        @endforeach
        @if(count($job->tags) > 6)
            <button class="text-xs font-bold text-blue-200 cursor-pointer hover:underline ml-1"
                id="see_more_{{ $job->id }}">see more..</button>
        @endif
    </div>
    <x-forms.form method="POST" action="" class="w-full mt-auto">
        @csrf
        <div class="flex mt-4 justify-end">
            @csrf
             <x-forms.button
                    class="{{ !now()->greaterThan($job->expiry) ? 'cursor-pointer' : 'disable opacity-70 pointer-events-none' }}">Apply
                </x-forms.button>
        </div>
    </x-forms.form>
    <script>
        document.getElementById('see_more_{{ $job->id }}')?.addEventListener('click', function () {
            document.querySelectorAll('.extra-tag-{{ $job->id }}').forEach(el => {
                if (el.classList.contains('hidden')) {
                    el.classList.remove('hidden');
                    el.classList.add('flex');
                } else {
                    el.classList.add('hidden');
                    el.classList.remove('flex');
                }
                this.innerText = el.classList.contains('hidden') ? 'See more...' : 'See less...';
            });
        });
    </script>
</x-panel>