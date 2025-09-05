<x-layout maxWidth="max-w-[1040px]">

    <section class="flex flex-col text-center gap-20 pt-10">

        <x-page-heading>Welcome {{ auth()->user()->name ?? '' }}</x-page-heading>

        <table class="bg-gray-100 shadow rounded-xl overflow-hidden border border-gray-700">
            <thead class="text-sm font-semibold text-gray-700 bg-gray-200">
                <tr class="divide-x divide-gray-700">
                    <th class="px-4 py-2">Employer</th>
                    <th class="px-4 py-2">Job Title</th>
                    <th class="px-4 py-2">Schedule & Salary</th>
                    <th class="px-4 py-2">Tags</th>
                    <th class="px-4 py-2">Published</th>
                    <th class="px-4 py-2">Last Date</th>
                    <th class="px-6 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-700">
                @foreach ($jobs as $job)
                    <tr class="hover:bg-gray-50 divide-x divide-gray-700">
                        <td class="px-4 py-3">
                            <a href="{{ $job->url }}" target="_blank"
                                class="hover:underline font-bold text-blue-800">
                                {{ $job->employer->name }}
                            </a>
                        </td>

                        <td class=" text-black px-4 py-3 font-bold">
                            {{ $job->title }}
                        </td>

                        {{-- Schedule & Salary --}}
                        <td class="px-4 py-3 text-gray-500">
                            {{ $job->schedule }} - {{ $job->salary }}
                        </td>


                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-1">
                                @foreach ($job->tags as $tag)
                                <x-tag :$tag class="text-gray-700 bg-gray-100" />
                                @endforeach
                            </div>
                        </td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ date('d/m/Y', strtotime($job->created_at)) }}
                        </td>

                        <td class="px-4 py-3 font-semibold text-gray-700">
                            @if (now()->greaterThan($job->expired_at))
                                <span class="text-red-500 font-bold">
                                    This job is expired on {{ $job->expired_at }}.
                                </span>
                            @else
                                {{ date('d/m/Y', strtotime($job->expired_at)) }}
                            @endif
                        </td>

                        <td class="px-6 py-3 text-right">
                            <form method="POST" action="">
                                @csrf
                                <div class="flex flex-col gap-1 my-auto">
                                    <x-forms.button class="cursor-pointer">Applicants</x-forms.button>
                                    <x-forms.button class="cursor-pointer">Edit</x-forms.button>
                                    <button form="delete-job-form" class="cursor-pointer text-red-500 text-base font-bold">Delete</button>
                                    <a href="/delete"></a>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


</x-layout>
