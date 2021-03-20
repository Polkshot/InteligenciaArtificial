<?php
require("Mysql.class.php");

//AQUI ESTÃO OS GETS
//eles vão na classe mysql e fazem a conexão com o banco
//e retornam aqui para tratar o retorno se necessário

function getObjetivos(){
  $mysql = new Mysql();
  $objetivos = $mysql->getDados("objetivos");

  $objetivosTela = "";
  foreach ($objetivos as $objetivo) {
    $objetivosTela .= "<option value = '".$objetivo['id']."' > ".$objetivo['nome']." </option>";
  }

  return $objetivosTela;
}

function getObjetivoById($id){
  $mysql = new Mysql();
  $objetivo = $mysql->getDadosByCampo("objetivos","id",$id,true);

  return $objetivo;
}

function getExercicioIDSByObjetivoId($id_objetivo){
  $mysql = new Mysql();
  $ids = $mysql->getDadosByCampo("objetivosexercicios","id_objetivo",$id_objetivo);

  return $ids;
}

function getExercicioIDSByIMCId($id_imc){
  $mysql = new Mysql();
  $ids = $mysql->getDadosByCampo("imc_objetivos","id_imc",$id_imc);

  return $ids;
}

//traz os exercicios de acordo com os ids passados e trata pra listar na tela de forma ordenada
function getExercicios($ids){
  $mysql = new Mysql();
  $exercicios = $mysql->getDados("exercicios","id",$ids);

  $exerciciosTela = "<ul>";
  foreach ($exercicios as $exercicio) {
    $exerciciosTela .= "<li> ".$exercicio['nome']." </li>";
  }
  $exerciciosTela .= "</ul>";

  return $exerciciosTela;
}

function getUsuarioById($id){
  $mysql = new Mysql();
  $user = $mysql->getDadosByCampo("usuarios","id",$id,true);

  return $user;
}

function getUsuarioByEmail($email){
  $mysql = new Mysql();
  $user = $mysql->getDadosByCampo("usuarios","email",$email,true);
  return $user;
}

function getIMCS(){
  $mysql = new Mysql();
  $imcs = $mysql->getDados("imc");

  return $imcs;
}

// AQUI TERMINA OS GETS

//Função que faz o cadastro
function insereUsuario($usuarios){
  $mysql = new Mysql();
  $insere = $mysql->insertDadosUsuarios($usuarios);
  return true;
}

//RECOMENDAÇÕES
function recomendacaoExercicioDeAcordoComObjetivo($id_objetivo){
  $ids_exercicios = getExercicioIDSByObjetivoId($id_objetivo);//Pega os ids dos exercicios vinculados ao objetivo selecionado.
  $ids_exerciciosEmString = arrayIdsToString($ids_exercicios);

  $objetivo = getObjetivoById($id_objetivo);

  $treino = "<div style='text-align:center;'>";
  $treino .= "<h2> Como seu objetivo é ".$objetivo[0]['nome']." recomendamos: </h2>";
  $treino .= getExercicios($ids_exerciciosEmString);//Chama a função de pegar os exercicios.
  $treino .= "</div>";

  return $treino;
}

function recomendacaoExercicioDeAcordoComIMC(){
  $usuario = getUsuarioById($_SESSION['id_usuario']);
  $imc_usuario_valor = $usuario[0]['imc'];
  $imcs = getIMCS();
  $id_imc_usuario = 0;
  $imc_classificacao = "";
  //De acordo com o valor do imc do usurio ele é de certa categoria
  //Vejo se o valor do imc do usuario for menor ou igual a tal ao maximo da categoria seleciono essa pra ele
  foreach ($imcs as $imc) {
    if($imc_usuario_valor <= $imc['maximo']){
      $id_imc_usuario = $imc['id'];
      $imc_classificacao = $imc['classificacao'];
      break;
    }
  }
  $ids_exercicios = getExercicioIDSByIMCId($id_imc_usuario);
  $ids_exerciciosEmString = arrayIdsToString($ids_exercicios);

  $treino = "<br><br><div style='text-align:center;'>";
  $treino .= "<h2> Seu IMC é ".$imc_usuario_valor." <br> entrando para a categoria ".$imc_classificacao."<br> então recomendamos fazer esses exercícios também: </h2>";
  $treino .= getExercicios($ids_exerciciosEmString);//Chama a função de pegar os exercicios.
  $treino .= "</div>";

  return $treino;
}


function arrayIdsToString($ids){
  $ids_emString = "";
  foreach ($ids as $id) {
      $ids_emString .= "".$id['id_exercicio'].",";
  }
  $ids_emString = rtrim($ids_emString, ",");

  return $ids_emString;
}
?>
