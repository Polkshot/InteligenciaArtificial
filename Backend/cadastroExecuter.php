<?php
require("Controller.php");
require("Usuarios.class.php");

$id = "";
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$dataNascimento = $_POST["dataNascimento"];
$sexo = $_POST["sexo"];
$altura = (double) $_POST["altura"];
$peso = (double) $_POST["peso"];
$imc = $peso/($altura * $altura);
$id_TipoCorporal = 1;
$braco = $_POST["bracos"];
$busto = $_POST["busto"];
$cintura = $_POST["cintura"];
$coxa = $_POST["coxa"];
$quadril = $_POST["quadril"];
$senha = $_POST["senha"];

$usuarios = new Usuarios($id, $nome, $nome, $cpf, $email, $telefone, $dataNascimento, $sexo, $altura, $peso, $imc, $id_TipoCorporal, $braco, $busto, $cintura, $coxa, $quadril, $senha);

insereUsuario($usuarios);

header("Location:../index.php?cadastrado=true");
?>
