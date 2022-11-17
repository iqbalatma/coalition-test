<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
</head>

<body>
  <form action="{{ route('tasks.destroy', $id) }}" method="POST">
    @csrf
    @method("DELETE")
    <p>Are you sure want to delete this task ?</p>
    <button type="submit">Confirm</button>
  </form>
</body>

</html>