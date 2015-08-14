<!doctype html>
<html lang="en">
<head>

<? //stylesheets ?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/journal-bootstrap.min.css">
<link rel="stylesheet" href="/css/app.css">
<title>University of Florida LDAP directory</title>
</head>
<body>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">

    <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <a href="http://www.ufl.edu/" title="University of Florida home"><img src=#"></a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/">Home</a>
            </li>
          </ul>

        </div>


    </div>
  </div>
  <div class="container">
    @yield('content')
  </div>

  @yield('footer')
<? // javascript ?>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  @yield('scripts')
</body>
</html>
