<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
</head>

<body>
  <table>
    <thead>
      <th>No</th>
      <th>Project Name</th>
      <th>Created At</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach ($projects as $key => $project)
      <tr>
        <td>{{ $key }}</td>
        <td>{{ $project->name }}</td>
        <td>{{ $project->created_at??"-" }}</td>
        {{-- <td><a href="{{ route('pro') }}">Show Detail Task</a></td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>

  <hr>
  <br>
  <p>Add New Projects</p>
  <form action="" method="POST">
    @csrf
  </form>
</body>

</html>