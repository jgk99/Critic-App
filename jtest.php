<?php

$box_office = file_get_contents('http://api.rottentomatoes.com/api/public/v1.0/lists/movies/box_office.json?apikey=nqr68qe538tc2hsub2c5fubt');
$movielist = json_decode($box_office);

?>

<!DOCTYPE html>

<html>
<head>
  <title>My Movie Critic</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <meta charset="UTF-8">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
</head>
<body>
  <?php require_once("includes/header.php"); ?>
  <div class="container">
  


    <h3>Top Box Office Hits</h3>

  
  <script type="text/javascript">
  var movies = <?php echo $box_office ?>;
  var i = 0;
  </script>

    

 <div id="myCarousel" class="carousel slide well col-md-8">
 
<div class="carousel-inner">
	
<div class="item active">
	<div class="row">
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i;          
      </script></a></div>
  </div>
</div>
 
<div class="item">
	<div class="row">
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i;          
      </script></a></div>
  </div>
</div>
 
<div class="item">
	<div class="row">
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
  </div>
</div>
 
</div>
 
<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div>
<div class="col-md-1"></div>
<div class=" lead col-md-3 text-center">
  <form class="navbar-form navbar-right" action="search.php" method="post" role="search">
  <div class="form-group">
  <input type="text" name="query" class="form-control" placeholder="Movie Title">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<p> These are just some of the hottest movies around. If there are other movies that you want to find go to the search bar above.</p>
</div>


 <h3>In Theaters</h3>

  
  <script type="text/javascript">
  var movies = <?php echo $box_office ?>;
  var i = 0;
  </script>

    

 <div id="myCarousel" class="carousel slide well col-md-8">
 
<div class="carousel-inner">
  
<div class="item active">
  <div class="row">
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i;          
      </script></a></div>
  </div>
</div>
 
<div class="item">
  <div class="row">
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i;          
      </script></a></div>
  </div>
</div>
 
<div class="item">
  <div class="row">
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
    <div class="col-xs-3">
      <script type="text/javascript">
            document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");         
      </script> class="thumbnail">
      <script type="text/javascript">
        document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\" />");
        i++;          
      </script></a></div>
  </div>
</div>
 
</div>
 
<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div>





</div>
<?php require_once("includes/footer.php"); ?>
  </body>
</html>
