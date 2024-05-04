<x-layout>
     <x-slot:headings>
        Job Board
    </x-slot:headings>
    <div class="space-y-4">
        @foreach ($jobs as $job )
            <div>
                <a href="/jobs/show/{{$job['id']}}" class="block px-4 py-6 border border-gray-200">
                <p class="">{{$job->employer['name']}}</p>
                <strong>Poste</strong> : {{$job['title']}} - <strong>Salaire</strong> : {{$job['salary']}}</a>
            </div>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
