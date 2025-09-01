<x-layout>
    <div class="space-y-10">

        <section class="text-center pt-6">

            <x-page-heading>Let's Find Your Next Job</x-page-heading>

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input :label="false" name="q" placeholder="Web Developer..." />
            </x-forms.form>
        </section>

        <section class=" gap-5">
            <x-section-heading>Tags</x-section-heading>

            <div class="gap-2 flex justify-start flex-wrap items-baseline mt-2">
                @foreach ($tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>
        </section>

        <section class="mt-3">
            <x-section-heading>Explore jobs, Build your career today</x-section-heading>
            <div class="mt-6 space-y-6">
                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>

        <div class="mt-6 p-4">
            {{ $jobs->links() }}    
        </div>

    </div>
</x-layout>