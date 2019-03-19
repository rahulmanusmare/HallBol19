<?php
session_start();
require_once('navigation.php');
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!-- Header Carousel -->

  <div class="carousel carousel-slider center" data-indicators="true">
    <div class="carousel-item white-text" href="#one!" style="background: url(img/slide1.jpg);">
       
        <div class="carousel-caption">
          <h1>Get Your Game On</h1>
          <p>Register to enter the Battlefield</p>
          <p><a class="btn btn-lg btn-primary" href="./signup.php" role="button">Sign up now!</a></p>
        </div>
    </div>
    <div class="carousel-item white-text" href="#two!" style="background: url(img/slide2.jpg); background-position:top !important;">
      <div class="carousel-caption">
          <h1>HallaBol is for everyone</h1>
          <p>Come out and Play</p>
          <p><a class="btn btn-lg btn-primary" href="./about.php" role="button">Learn more</a></p>
        </div>
    </div>
    <div class="carousel-item white-text" href="#three!" style="background: url(img/slide3.jpg);">
        <div class="carousel-caption">
          <h1>10 nights of pure ecstasy</h1>
          <p>13 unique games</p>
          <p><a class="btn btn-lg btn-primary" href="./games.php" role="button">Browse games</a></p>
        </div>
      </div>
      <div class="carousel-item white-text" href="#four!" style="background: url(img/slide4.jpg);">
      <div class="carousel-caption">
          <h1>HallaBol is for everyone</h1>
          <p>Come out and Play</p>
          <p><a class="btn btn-lg btn-primary" href="./about.php" role="button">Learn more</a></p>
        </div>
        
    </div>
  </div>

    <header hidden="true">
    <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active"> <img src="img/slide1.jpg" style="width:100%" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Get Your Game On</h1>
          <p>Register to enter the Battlefield</p>
          <p><a class="btn btn-lg btn-primary" href="./signup.php" role="button">Sign up now!</a></p>
        </div>
      </div>
    </div>
    <div class="item"> <img src="img/slide2.jpg" style="width:100%" data-src="" alt="Second    slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>HallaBol is for everyone</h1>
          <p>Come out and Play</p>
          <p><a class="btn btn-lg btn-primary" href="./about.php" role="button">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="item"> <img src="img/slide3.jpg" style="width:100%" data-src="" alt="Third slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>10 nights of pure ecstasy</h1>
          <p>13 unique games</p>
          <p><a class="btn btn-lg btn-primary" href="./games.php" role="button">Browse games</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->

        <!-- About the event-->
        <div class="center" style="font-weight: bold">
            <h4>About the event</h4>
        </div>
        <div style="font-size: 18px"><b>Hallabol</b> is the time of the year when almost the entire student body comes out of their comfort zone to play. 13 games conducted in 10 nights means, a student not even interested in sports also finds some game which he/she can enjoy playing with friends. Not only do we witness high intensity matches, teams competing against each other with passion and the fighting spirit. But this is the time when we can see bonds being created, nurtured and flourished. The team formation rules are meant to increase inter batch interaction. To put it in simple words, the nights of Halla Bol are the most memorable ones in the campus.
        </div>
        
<!-- Features Section -->
        <div class="row">
            <div class="col l12">
                <h1 class="page-header center">Hallabol'19</h1>
            </div>


            <div class="col m8 s12">
                <!-- <iframe src="https://player.vimeo.com/video/122317190" width="750" height="500" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
                <iframe height="400" style="width:100%"  src="https://youtu.be/b1nUmHqctx0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col m4 s12">
                <div style="width:100%" class="fb-like-box" data-href="https://www.facebook.com/iitgn.hallabol" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
            </div>
    </div>
    </div>
<?php
    require_once 'footer.php';
?>

