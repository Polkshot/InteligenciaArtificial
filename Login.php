<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
	<body class="landing is-preload">
	    <?php
    if(isset($_GET['loginErro']) && $_GET['loginErro']){
      echo "<div style='color:red;margin-left:40%;border: 1px solid red;max-width:300px;text-align: center;'> <h3> E-mail ou senha errados! </h3> </div>";
    }
    else if(isset($_GET['semLogin']) && $_GET['semLogin']){
      echo "<div style='color:red;margin-left:40%;border: 1px solid red;max-width:300px;text-align: center;'> <h3> ACESSO NEGADO !<br>Faça Login para acessar essa página! </h3> </div>";
    }
    else if(isset($_GET['cadastrado']) && $_GET['cadastrado']){
      echo "<div style='color:green;margin-left:40%;border: 1px solid red;max-width:300px;text-align: center;'> <h3> Cadastrado com sucesso!<br> Já pode fazer login :) </h3> </div>";
    }
    else{
      echo "";
    }
    ?>
		<div id="page-wrapper">

			<!-- Banner -->
				<section id="banner">
					<h2>Fit Workout</h2><br>
					<p>Informe seus dados de acesso:</p>
					<form action="Backend/logar.php" method="post">
						<div class="row gtr-50 gtr-uniform">
							<div class="col-8 col-12" style="margin-left: 35%; max-width: 500px !important">
								<input type="text" name="email" id="email" placeholder="Email" /></br>
								<input type="password" name="senha" id="senha" placeholder="Senha" /></br>
								<input type="submit" value="Entrar">
								<br>
								<a href="cadastro.php">Quero me Cadastrar</a>
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
