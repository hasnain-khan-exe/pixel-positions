<x-layout>
    <div class="space-y-10">

        <section class="text-center pt-4">

            <x-page-heading>Let's Find Your Next Job</x-page-heading>

            <x-forms.form action="/search" class="mt-4">
                <x-forms.input :label="false" name="q" placeholder="Web Developer..." />
            </x-forms.form>
        </section>

        <section class="gap-5">
            <x-section-heading>Tags</x-section-heading>

            <div class="gap-2 flex justify-start flex-wrap items-baseline mt-4">
                @foreach ($tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>

        </section>

        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-4">
                @foreach ($featuredJobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </section>

    </div>
</x-layout>
