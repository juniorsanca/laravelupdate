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
        <p>
            <x-button href="/jobs/edit/{{$job['id']}}">Edit Job</x-button>
        </p>
</x-layout>
