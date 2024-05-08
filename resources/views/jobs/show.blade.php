<x-layout>
     <x-slot:headings>
        Job
    </x-slot:headings>
        <h2>
            Poste {{ $job['title'] }}
        </h2>
        <p>
            Salaire du poste {{ $job['salary'] }}
        </p>
        @can('edit-job', $job)
            <p>
                <x-button href="/jobs/{{$job['id']}}/edit">Edit Job</x-button>
            </p>
        @endcan
</x-layout>
