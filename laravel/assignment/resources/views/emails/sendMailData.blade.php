<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment 5</title>
</head>

<body>
  <table cellpadding="2" width="300" border="1" align="left">
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>Major</th>
    </tr>
    @foreach($students as $student)
    <tr>
      <td>{{ $student->name }}</td>
      <td>{{ $student->age }}</td>
      <td>{{ $student->major->major }}</td>
    </tr>
    @endforeach
  </table>
</body>

</html>