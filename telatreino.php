<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Tela Treino</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
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
    <div style="text-align: right;">
    </div>

    <?php
    if(isset($_GET['objetivo'])){

			$objetivo_id = $_GET['objetivo'];

			if(isset($_GET['id_exe']) && isset($_GET['gostou'])){
				insereInteracao($objetivo_id,$_GET['id_exe'], $_GET['gostou']);
			}

     echo recomendacaoExercicioDeAcordoComObjetivo($objetivo_id);

     echo recomendacaoExercicioDeAcordoComIMC($objetivo_id);
    }
    else {
      echo "Ops! Deu algo errado!";
    }
    ?>
	<br><br><br>
        <a href="logout.php">Logout</a>
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
