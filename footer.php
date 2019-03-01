<?php
if (!isset($_SESSION)) {
    	session_start();
	}
	require_once('./keyset.php');
	$sessionid = session_id();
	$addr = $_SERVER['REMOTE_ADDR'];
	$script = $_SERVER['SCRIPT_NAME'];
	$query = "INSERT INTO `visitors` (`visited_at`, `session_id`, `address`, `script`) 
	VALUES (CURRENT_TIMESTAMP, '$sessionid', '$addr', '$script')";
	run_query($query);
?>

	<div hidden="true" class="container">
    	<footer class="row">
				<div class="col-md-6 col-md-offset-3 copyright text-center">
					&copy Hallabol 2015. All Rights Reserved. <br>
					Site Designed and Developed by <a href="http://plus.google.com/+DhruvPancholi" target="new">Dhruv Pancholi</a><br>
					Maintained by <a href="http://ashimrajkonwar.me/" target="new">Ashim Raj Konwar</a>
					
				</div>
				<div class="col-md-offset-1 col-md-2">
					<strong>Site Hits:
					<?php
						$result = run_query('SELECT COUNT(*) FROM visitors');
						$result = run_query('SELECT COUNT(*) FROM visitors');
						$row = mysql_fetch_row($result);
						echo $row[0];
					?>
					</strong>
				</div>
        </footer>
        
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