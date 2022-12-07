<!DOCTYPE html>
<html>
<head>
    <title>event App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('events') }}">event Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('events') }}">View All events</a></li>
        <li><a href="{{ URL::to('events/create') }}">Create an event</a>
    </ul>
</nav>

<h1>Showing {{ $event->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $event->name }}</h2>
        <p>
            <strong>Name:</strong> {{ $event->name }}<br>
            <strong>Slug:</strong> {{ $event->slug }}<br>
            <strong>Starts Sate:</strong> {{ $event->startAt }}<br>
            <strong>Ends Date:</strong> {{ $event->endsAt }}
        </p>
    </div>

</div>
</body>
</html>