<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <br>
    <h2 class="font-bold text-lg">{{ $job->name }}</h2>
    <p>This is {{ $job->price }} rupees.</p>

    @can('edit', $job)
        <x-button class="mt-4" href="/jobs/{{ $job->id }}/edit">
            Edit Job
        </x-button>
    @endcan
</x-layout>
