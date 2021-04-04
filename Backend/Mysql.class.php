<?php
  class Mysql {
    var $server = "localhost";
    var $user = "root";
    var $pass = "";
    var $database = "exercy-dietas";

    function Mysql(){
    }

    public function getDados($tabela,$campo = "",$valores = ""){
      $conexao = new PDO("mysql:host=".$this->server.";dbname=".$this->database."",$this->user,$this->pass);

      $sql = 'SELECT * FROM '.$tabela.'';
      if($valores != "" && $campo != "") $sql .= " WHERE ".$campo." IN (".$valores.")";
      $query = $conexao->query($sql);
      $dados = $query->fetchAll();
      $conexao = null;

      return $dados;
    }

    public function getDadosByCampo($tabela,$campo,$valorCampo,$limit = false){
      $conexao = new PDO("mysql:host=".$this->server.";dbname=".$this->database."",$this->user,$this->pass);

      $sql = 'SELECT * FROM '.$tabela.' WHERE '.$campo.' = ';
      $sql .= is_string($valorCampo) ? '"'.$valorCampo.'"' : ''.$valorCampo.'';
      if($limit) $sql .= " LIMIT 1";
      $query = $conexao->query($sql);
      $dado = $query->fetchAll();

      return $dado;
    }

    public function insertDadosUsuarios($dados){
      $conexao = new PDO("mysql:host=".$this->server.";dbname=".$this->database."",$this->user,$this->pass);
      $campos = "usuario, nome, cpf, email, telefone, dataNascimento, sexo, altura, peso, imc, objetivo, id_TipoCorporal, braco, busto, cintura, coxa, quadril, senha";

      $valores = "'".$dados->getUsuario()."', '".$dados->getNome()."', '".$dados->getCpf()."', '".$dados->getEmail()."', '".$dados->getTelefone()."', 0000-00-00, '".$dados->getSexo()."',";
      $valores .= " ".$dados->getAltura().", ".$dados->getPeso().", ".$dados->getImc().", ".$dados->getObjetivo().", ".$dados->getIdTipoCorporal().", ".$dados->getBraco().", ".$dados->getBusto().", ".$dados->getCintura().",";
      $valores .= " ".$dados->getCoxa().", ".$dados->getQuadril().", '".$dados->getSenha()."'";

      print('INSERT INTO usuarios ('.$campos.') VALUES('.$valores.')');
      $query = $conexao->exec('INSERT INTO usuarios ('.$campos.') VALUES('.$valores.')');

      return $query;
    }

    public function insertInteracao($dados){

      $conexao = new PDO("mysql:host=".$this->server.";dbname=".$this->database."",$this->user,$this->pass);
      $campos = "id_usuario, id_exercicio, id_objetivo, id_imc, Gostou";
      $valores = "".$dados['id_usuario'].", ".$dados['id_exercicio'].", ".$dados['id_objetivo'].", ".$dados['id_imc'].", ".$dados['gostou']."";

      $query = $conexao->exec('INSERT INTO interacao ('.$campos.') VALUES('.$valores.')');

      return $query;
      }


  }
?>
