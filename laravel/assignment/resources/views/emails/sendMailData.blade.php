<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment 5</title>
</head>

<body>
  <p>Name | Age | Major</p>
  @foreach($students as $student)
  {{ $student->name }} |
  {{ $student->age }} |
  {{ $student->major }} <br>
  @endforeach

</body>

</html>