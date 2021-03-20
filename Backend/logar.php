<?php
require("Controller.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$user = getUsuarioByEmail($email);
if(!empty($user)){
  if($user[0]['senha'] == $senha){
      session_start();
      $_SESSION['id_usuario'] = $user[0]['id'];

      header("Location:../objetivos.php");

  }else{
    header("Location:../login.php?loginErro=true");
  }
}
else{
  header("Location:../login.php?loginErro=true");
}

?>
