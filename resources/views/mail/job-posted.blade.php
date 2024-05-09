<h2>
    {{ $job->title }}
</h2>

<h3>
    Congrats ! you job is now live on our website
</h3>

<div>
    <p>
        <a href="{{ url('/jobs/' . $job->id) }}">View your Job listing</a>
    </p>
</div>
