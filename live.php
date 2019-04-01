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

    <div class="container">

<!-- Features Section -->
        <div class="row">
            <div class="col l12">
                <h1 class="page-header center">Hallabol'19 Live Finals</h1>
            </div>


            <div class="col m8 s12 center l8 offset-m2 offset-l2">
               <iframe width="100%" height="600px" src="https://www.youtube.com/embed/3T670vQsQO4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
    </div>
    </div>
<?php
    require_once 'footer.php';
?>

