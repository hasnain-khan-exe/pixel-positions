<x-layout>
    <div class="space-y-10">

        <section class="text-center pt-6">
            
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>

            <form action="" class="mt-6">
                <input class="rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full max-w-xl" type="text" name="" id="" placeholder="I am looking for a...">
            </form>

        </section>

        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                <x-job-card />
                <x-job-card />
                <x-job-card />
            </div>
        </section>

        <section>

            <x-section-heading>Tags</x-section-heading>

            <div class="mt-6 space-x-1">
                <x-tag>Tag 1</x-tag>
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 3</x-tag>
                <x-tag>Tag 4</x-tag>
                <x-tag>Tag 5</x-tag>
                <x-tag>Tag 6</x-tag>
                <x-tag>Tag 7</x-tag>
                <x-tag>Tag 8</x-tag>
                <x-tag>Tag 9</x-tag>
                <x-tag>Tag 10</x-tag>
            </div>

        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                <x-job-card-wide />
                <x-job-card-wide />
                <x-job-card-wide />
            </div>
        </section>

    </div>
</x-layout>