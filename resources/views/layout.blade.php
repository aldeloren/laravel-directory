<!doctype html>
<html lang="en">
<head>

<? //stylesheets ?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel='stylesheet' href='//assets.webadmin.ufl.edu/fonts/fonts.css'> 
<link rel="stylesheet" href="/css/app.css">
<title>University of Florida LDAP directory</title>
</head>
<body>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="" id="navbar-main">
          <ul class="nav navbar-nav">
            <li id="logo-home">
              <a href="/" title="UF Directory"><img src="{{ asset('images/uf-directory-logo.png') }}"></a>
            </li>
          </ul>
        </div>
    </div>
  </div>
  <div class="container">
    @yield('content')
  </div>

  @yield('footer')

<!-- FOOTER ===================================================================================== -->
      <div class="container-fluid">
      <footer id="institutional">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h4>Institutional Links</h4>
              <ul>
                <li><a href="https://my.ufl.edu/ps/signon.html" target="_blank">myUFL</a></li>
                <li><a href="http://campusmap.ufl.edu/" target="_blank">Campus Map</a></li>
                <li><a href="http://news.ufl.edu/" target="_blank">News</a></li>
                <li><a href="http://calendar.ufl.edu/" target="_blank">Calendar</a></li>
                <li><a href="https://directory.ufl.edu/" target="_blank">Directory</a></li>
                <li><a href="http://www.ufl.edu/websites/" target="_blank">Web Site Listing</a></li>
                <li><a href="http://www.questions.ufl.edu/" target="_blank">Ask UF</a></li>
              </ul>
            </div><!-- /.col-sm-4 -->
            
            <div class="col-sm-4">
              <h4>Legal Links</h4>
              <ul>
                <!-- ==================================================== Place correct text-only url here... -->
                <li><a href="http://assistive.usablenet.com/tt/socialmedia.ufl.edu" accesskey="t" title="Text-only version of this website" target="_blank">Text-only Version</a></li>
                <li><a href="http://www.ufl.edu/disability/" target="_blank">Disability Services</a></li>
                <li><a href="http://privacy.ufl.edu/privacystatement.html" target="_blank">Privacy Policy</a></li>
                <li><a href="http://regulations.ufl.edu/" target="_blank">Regulations</a></li>
                <li><a id="contact-webmaster" href="mailto:tsand@ufl.edu" target="_blank">Contact Webmaster</a></li>
              </ul>
              <p>This page uses <a href="http://www.google.com/analytics/" target="_blank">Google Analytics</a><br />
              (<a href="http://www.google.com/intl/en_ALL/privacypolicy.html" target="_blank">Google Privacy Policy</a>)</p>
            </div><!-- /.col-sm-4 -->
            
            <div class="col-sm-4">
              <p><a href="http://ufl.edu" target="_blank"><img src="/images/uf_logo_full.png" alt="University of Florida" /></a></p>
              <p id="social"><a href="http://www.facebook.com/uflorida/" target="_blank"><span class="fui-facebook"></span></a> <a href="http://twitter.com/uf/" target="_blank"><span class="fui-twitter"></span></a> <a href="http://www.youtube.com/user/universityofflorida/" target="_blank"><span class="fui-youtube"></span></a></p>
              <p>&copy; 2014 <a href="http://www.ufl.edu" target="_blank">University of Florida</a>,<br />
              Gainesville, FL 32611<br />
              (352) 392-3261</p>
            </div><!-- /.col-sm-4 -->
          </div><!-- /.row -->
          <div class="row">
            <p style="text-align:center;">Site Updated: <script>document.write(document.lastModified);</script></p>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </footer>
    </div><!-- /.container-fluid -->


<? // javascript ?>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  @yield('scripts')
</body>
</html>
