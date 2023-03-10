<?php
  session_start();
  include_once("conexao.php");

  $cpf = $_POST['cpf'];
  $nome = $_POST['nome'];
  $nums = [10, 9, 8, 7, 6, 5, 4, 3, 2];

  if(strlen($cpf) == 0 and strlen($cpf) > 11){
    $_SESSION['msg']= "<p style='color:red'>CPF INVALIDO! <br> numero de digitos invalido</p>";
    header("location: cad_cpf.php");
  }else{

    // VALIDAR O PENULTIMO DIGITO
    for ($i=0; $i < 9; $i++) { 
      $soma += $cpf[$i] * $nums[$i];
    }

    if($soma%11 < 2){
      $ultima1 = 0;
    }else{
      $ultima1 = 11 - ($soma%11);
    }

    // VALIDAR O ULTIMO DIGITO
    $nums = [11, 10, 9, 8, 7, 6, 5, 4, 3, 2];
    $soma = 0;

    for ($i=0; $i < 10; $i++) { 
      $soma += $cpf[$i] * $nums[$i];
    }

    if($soma%11 < 2){
      $ultima2 = 0;
    }else{
      $ultima2 = 11 - ($soma%11);
    }

    
    if($cpf[9] == $ultima1 and $cpf[10] == $ultima2){
      $_SESSION['msg']= "<p style='color: green'>CPF VALIDO!</p>";
      $_SESSION['cpf']= $cpf;
      $comandoSql = "insert into cpf (id, nome, cpf) value (default, '$nome', '$cpf')";
      $insereUser = mysqli_query($con, $comandoSql);
      header("location: result_cpf.php");
    }else{
      $_SESSION['msg'] = "<p style='color: red'>CPF INVALIDO! <br> numeraçao errada</p>";
      $_SESSION['cpf']= $cpf;
      // $_SESSION['cpf']= $cpf;
      header("location: cad_cpf.php");
    }
    
  }
?>