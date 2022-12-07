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

<h1>Create a event</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'events')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('slug', 'slug') }}
        {{ Form::text('slug', Input::old('slug'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('start', 'Start') }}
        {{ Form::date('startAt', Input::old('start'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('ends', 'End') }}
        {{ Form::date('endsAt', Input::old('ends'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the event!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>