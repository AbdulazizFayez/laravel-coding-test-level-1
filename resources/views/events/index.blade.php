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
        <li><a href="{{ URL::to('events/create') }}">Create a event</a>
    </ul>
</nav>

<h1>All the events</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Slug</td>
            <td>Start Date</td>
            <td>End Date</td>
        </tr>
    </thead>
    <tbody>
    @foreach($events as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->slug }}</td>
            <td>{{ $value->startAt }}</td>
            <td>{{ $value->endsAt }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the event (uses the destroy method DESTROY /events/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the event (uses the show method found at GET /events/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('events/' . $value->id) }}">Show this event</a>

                <!-- edit this event (uses the edit method found at GET /events/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('events/' . $value->id . '/edit') }}">Edit this event</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>