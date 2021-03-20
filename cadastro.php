<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cadastro</title>
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
					<p>Fale mais sobre você =D</p>
					<form action="login.php" method="get">
						<div class="row gtr-50 gtr-uniform">
							<div class="col-8 col-12">
							<input type="text" name="nome" id="nome" placeholder="Nome" /></br>
							<input type="text" name="cpf" id="cpf" placeholder="CPF" /></br>
							<input type="text" name="email" id="email" placeholder="Email" /></br>
							<input type="text" name="telefone" id="telefone" placeholder="Telefone" /></br>
							<input type="text" name="datanascimento" id="datanascimento" placeholder="Data de Nascimento" /></br>
							<input type="text" name="sexo" id="sexo" placeholder="Sexo" /></br>
							<input type="text" name="altura" id="altura" placeholder="Altura" /></br>
							<input type="text" name="peso" id="peso" placeholder="Peso" /></br>
							<input type="text" name="braco" id="braco" placeholder="Braço" /></br>
							<input type="text" name="busto" id="busto" placeholder="Busto" /></br>
							<input type="text" name="cintura" id="cintura" placeholder="Cintura" /></br>
							<input type="text" name="coxa" id="coxa" placeholder="Coxa" /></br>
							<input type="text" name="quadril" id="quadril" placeholder="Quadril" /></br>
							<input type="password" name="senha" id="senha" placeholder="Senha" /></br>
							
		
								<input type="submit" value="Me Cadastrar"> <br>
								<a href="index.php">Cancelar</a>
							</div>
						</div>
					</form>
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