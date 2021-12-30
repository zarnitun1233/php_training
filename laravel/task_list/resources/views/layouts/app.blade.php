<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel Quickstart - Basic</title>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

  <!-- Styles -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Lato';
    }

    .fa-btn {
      margin-right: 6px;
    }

    .navbar-nav {
      float: right;
    }

    ul {
      list-style-type: none;
    }

    ul li {
      padding: 15px;
    }

    ul li a:hover {
      text-decoration: none;
    }
  </style>
</head>

<body id="app-layout">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          Task List
        </a>
      </div>
      <ul class="navbar-nav">
        @guest
        <li class="nav-item"><a href="{{ url('login') }}" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="{{ url('registration') }}" class="nav-link">Register</a></li>
        @else
        <li class="nav-item"><a href="{{ url('logout') }}" class="nav-link">Logout</a></li>
        @endguest
      </ul>


    </div>
  </nav>
  <div class="card-body">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
  </div>

  @yield('content')

  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>