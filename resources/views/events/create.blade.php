<!DOCTYPE html>
<html>
<head>
    <title>event App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('events') }}">event Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('events') }}">View All events</a></li>
        <li><a href="{{ URL::to('events/create') }}">Create a event</a>
    </ul>
</nav>

<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">   
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('events')}}">
       @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
         <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" id="slug" name="slug" class="form-control" required="">
        </div>
         <div class="form-group">
          <label for="start">Start Date</label>
          <input type="date" id="start" name="startAt" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="end">End Date</label>
          <input type="date" name="endsAt" class="form-control" required=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>
