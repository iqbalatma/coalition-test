<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
</head>

<body>
  <select name="project" id="project" style="margin-left: 50px">
    <option value="" disabled selected>Please Select The Project</option>
    @foreach ($projects as $project)
    <option value="{{ $project->id }}" data-tasks="{{ json_encode($project->task) }}">{{ $project->name }}</option>
    @endforeach
  </select>

  <div class="task" id="task">
    <ul id="ul-task">

    </ul>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

  <script>
    $( document ).ready(function() {
      $("#project").on("change", function(){
        let dataTask = $(this).find("option:selected").data("tasks");

        let ul = $("#ul-task");

        if(dataTask.length > 0){
          $(ul).empty();

          dataTask.forEach(element => {
            ul.append(`<li>${element.name}</li>`)
          });
        }
      })
    });
  </script>
</body>

</html>