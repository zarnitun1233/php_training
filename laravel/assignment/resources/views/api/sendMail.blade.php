<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Assignment 5</title>
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="float-start">
          <h2>Send Student Data to email</h2>
        </div>
        <div class="float-end">
          <a class="btn btn-success" href="{{ url('/api') }}">Back</a>
        </div>
      </div>
    </div>
    <form action="" method="GET" id="mail">
      @csrf
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Email:</strong>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            <div id="error-email"></div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" id="submit" class="btn btn-primary mt-3">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $('#submit').on('click', function(e) {
      e.preventDefault();
      $.ajax({
        url: '/api/mail',
        method: 'POST',
        data: $('#mail').serialize(),
        success: function(data) {
          alert("Sent Data to email Successfully!");
          window.location = "/api";
        },
        error: function(err) {
          $email = $('#email').val();
          if (!$email) {
            $('#error-email').addClass("alert alert-danger").append("Email Field cannot be empty!");
          }
        }
      });
    });
  </script>
</body>

</html>