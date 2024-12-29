<x-layout>
    <x-slot:heading>
        Job List
    </x-slot:heading>
    <br>

    <div>
        @foreach($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="text-bold text-blue-500 text-sm">
                    {{ $job->name }}
                </div>
                <div>
                    <strong>{{ $job['name'] }} </strong> is Rs. {{ $job['price'] }}.
                </div>
            </a>
        @endforeach
    </div>

    <div>
        {{ $jobs->links() }}
    </div>
</x-layout>
