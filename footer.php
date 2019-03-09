<?php/*
if (!isset($_SESSION)) {
    	session_start();
	}
	require_once('./keyset.php');
	$sessionid = session_id();
	$addr = $_SERVER['REMOTE_ADDR'];
	$script = $_SERVER['SCRIPT_NAME'];
	$query = "INSERT INTO `visitors` (`visited_at`, `session_id`, `address`, `script`) 
	VALUES (CURRENT_TIMESTAMP, '$sessionid', '$addr', '$script')";
	run_query($query);*/
?>
		
		<br>
		<div class="row" style="padding:30px 10% 30px 10%;background-color:#232323;color:#eee;margin-bottom:-10px !important;">
			<div class="col-md-6"  style="float:left;margin-top:10px;">

				&copy Hallabol 2019	| All Rights Reserved
			</div>
			<div class="col-md-6" style="float:right;text-align:right;">
					Site Designed and Developed by <a href="http://plus.google.com/+DhruvPancholi" target="new">Dhruv Pancholi</a><br>
					Maintained by
					<a href="http://rahulmanusmare.github.io">Rahul Manusmare </a> |
					<a href="http://github.com/nishikantparmariam" target="new">Nishikant Parmar</a> |
					Viraj Shah
			</div>
		</div>
		
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60917503-1', 'auto');
  ga('send', 'pageview');

</script> 
</body>
</html>