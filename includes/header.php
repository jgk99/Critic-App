<?php

  $login = "";
  $loginlink = "";
  $account = "";
  $accountlink = "";

  if (isset($_COOKIE["userId"])) {
    $login = "Log Out";
    $account = "Account";
    $accountlink ="account.php";
    $loginlink = "logout.php";
    $signin ='<form class="navbar-form navbar-right" action="search.php" method="post" role="search">
        <div class="form-group">
          <input type="text" name="query" class="form-control" placeholder="Movie Title">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>';
  }
  else {
    $signin='<form class="navbar-form navbar-right form-inline" action="signin.php" method="post">
 <div class="form-group">
    <input type="text" name="username" class="form-control" id="inputPassword2" placeholder="Username">
  </div>
  <div class="form-group">
    <input type="password" name="pw" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <button type="submit" name="submit" class="btn btn-default">Sign In</button>
</form>';
    $account = "Sign Up";
    $accountlink ="signup.php";
    $login = "Log In";
    $loginlink = "logout.php";
  }
echo'
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">My Movie Critic</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="boxoffice.php">Movies<span class="sr-only">(current)</span>
        </a></li>
        <li><a href="'.$accountlink.'">'.$account.'</a></li>
      </ul>
      '.$signin.'
    </div>
  </div>
</nav>
'
?>