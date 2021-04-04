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
function getExercicios($ids,$id_objetivo){
  $mysql = new Mysql();
  $usuario = getUsuarioById($_SESSION['id_usuario']);

  $exercicios = $mysql->getDados("exercicios","id",$ids);

  $feedback = iteracao($id_objetivo);
  $exerciciosTela = "<ul>";
  foreach ($exercicios as $exercicio) {
    $qtdGostaram = 0;
    $qtdNaoGostaram = 0;
    $jaDeuLike = false;
    foreach($feedback['gostaram'] as $gostaram){
      if($gostaram == $exercicio['id']){
        $qtdGostaram = $qtdGostaram + 1;
      }
    }
    foreach($feedback['naoGostaram'] as $naoGostaram){
      if($naoGostaram == $exercicio['id']){
        $qtdNaoGostaram = $qtdNaoGostaram + 1;
      }
      $iteracoesbyExercicio = $mysql->getDadosByCampo("interacao", "id_exercicio", $exercicio['id']);
      foreach ($iteracoesbyExercicio as $array) {
        if($array['id_exercicio'] == $exercicio['id'] && $array['id_usuario'] == $usuario[0]['id']){
          $jaDeuLike = true;
        }
      }
    }
    $like = "";
    $dislike = "";
    if(!$jaDeuLike){
      $like = "(<a href='telatreino.php?objetivo=".$id_objetivo."&id_exe=".$exercicio['id']."&gostou=true'>Gostei</a>)";
      $dislike = "(<a href='telatreino.php?objetivo=".$id_objetivo."&id_exe=".$exercicio['id']."&gostou=false'> Não Gostei</a>)";
    }
    $exerciciosTela .= "<li> ".$exercicio['nome'].": ".$qtdGostaram." Gostou".$like." | ".$qtdNaoGostaram." Não Gostou".$dislike." </li>";
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

function insereInteracao($id_objetivo, $id_exercicio, $gostou){
  $mysql = new Mysql();
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

  $dados = array('id_usuario' => $usuario[0]['id'], 'id_exercicio' => $id_exercicio, 'id_objetivo' => $id_objetivo, 'id_imc' => $id_imc_usuario, 'gostou' => $gostou);
  $mysql->insertInteracao($dados);
}
//RECOMENDAÇÕES
function iteracao($id_objetivo){
  $mysql = new Mysql();
  $usuario = getUsuarioById($_SESSION['id_usuario']);

  $similaridadeByObjetivo = $mysql->getDadosByCampo("interacao","id_objetivo",$id_objetivo);
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
  $similaridadeByIMC = $mysql->getDadosByCampo("interacao","id_imc",$id_imc_usuario);

  $gostaram = [];
  $naoGostaram = [];
  $userJaDeuLike = false;
  foreach ($similaridadeByObjetivo as $rec) {
    if($rec['Gostou']){
      array_push($gostaram,$rec['id_exercicio']);
    }
    else{
      array_push($naoGostaram,$rec['id_exercicio']);
    }
  }

  foreach ($similaridadeByIMC as $rec) {
    if($rec['Gostou']){
      array_push($gostaram,$rec['id_exercicio']);
    }
    else{
      array_push($naoGostaram,$rec['id_exercicio']);
    }
  }

  return(array('gostaram' => $gostaram, 'naoGostaram' => $naoGostaram));
}

function recomendacaoExercicioDeAcordoComObjetivo($id_objetivo){
  $ids_exercicios = getExercicioIDSByObjetivoId($id_objetivo);//Pega os ids dos exercicios vinculados ao objetivo selecionado.
  $ids_exerciciosEmString = arrayIdsToString($ids_exercicios);

  $objetivo = getObjetivoById($id_objetivo);

  $treino = "<div style='text-align:center;'>";
  $treino .= "<h4> Como seu objetivo é ".$objetivo[0]['nome']." recomendamos: </h4>";
  $treino .= getExercicios($ids_exerciciosEmString,$id_objetivo);//Chama a função de pegar os exercicios.
  $treino .= "</div>";

  return $treino;
}

function recomendacaoExercicioDeAcordoComIMC($id_objetivo){
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
  $treino .= "<h4> Seu IMC é ".$imc_usuario_valor." <br> entrando para a categoria ".$imc_classificacao."<br> então recomendamos fazer esses exercícios também: </h4>";
  $treino .= getExercicios($ids_exerciciosEmString,$id_objetivo);//Chama a função de pegar os exercicios.
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
