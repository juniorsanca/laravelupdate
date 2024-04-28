<x-layout>
     <x-slot:headings>
        Job Board
    </x-slot:headings>
    @foreach ($jobs as $job )
        <a href="/jobs/{{$job['id']}}">
            <strong>Poste</strong> : {{$job['title']}} - <strong>Salaire</strong> : {{$job['salary']}}</a><br>
    @endforeach
</x-layout>
