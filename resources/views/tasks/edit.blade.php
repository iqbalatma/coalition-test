<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
</head>

<body>

  <h1>This is edit page</h1>

  @if ($message = Session::get('success'))
  <div>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  @if ($message = Session::get('failed'))
  <div>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  @if ($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif


  <form action="{{ route('tasks.update', $tasks->id) }}" method="POST">
    @csrf
    @method("PATCH")
    <label for="project">Select your project</label>
    <select name="project_id" style="margin-left: 50px">
      <option value="" disabled selected>Please Select The Project</option>
      @foreach ($projects as $project)
      <option value="{{ $project->id }}">{{ $project->name }}</option>
      @endforeach
    </select><br>
    <label for="name">Name</label> <input type="text" name="name" placeholder="Enter your task name" value="{{ $tasks->name }}"><br>
    <label for="priority">Priority</label> <input type="number" name="priority" placeholder="Enter your priority !" value="{{ $tasks->priority }}"><br>

    <button type="submit">Update</button>

  </form>

</body>

</html>