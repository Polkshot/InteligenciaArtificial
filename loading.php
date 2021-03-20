<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<script>
		var segs = 6;

		// Update the count down every 1 second
		var x = setInterval(function() {
		  segs = segs -1;
		  document.getElementById("demo").innerHTML = segs + "s ";
			
		  // If the count down is over, write some text 
		  if (segs <= 0) {
			clearInterval(x);
			var treino = window.location.href.replace("loading","telatreino");
			console.log(treino);
			window.location.href = treino;
			//document.getElementById("demo").innerHTML = "EXPIRED";
		  }
		}, 1000);
	</script>
	<head>
		<title>Loading</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
	<body class="landing is-preload">
<?php
require("Backend/Controller.php");
session_start();
if(!isset($_SESSION['id_usuario'])){
  header("Location:index.php?semLogin=true");
}
?>

		<div id="page-wrapper">

			<!-- Banner -->
				<section id="banner">
					<h2>Fit Workout</h2><br>
					<p>Estamos preparando seu treino...</p>
                    <p id="demo"></p>					
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>