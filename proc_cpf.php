<?php
  session_start();
  include_once("conexao.php");

  $cpf = $_POST['cpf'];
  $nome = $_POST['nome'];

  if($_POST['senha1'] != $_POST['senha2']){
    $_SESSION['msg']= "Senhas devem ser iguais";
    header("location: cad_cpf.php");
  }

  $senha = md5($_POST['senha1']);
  $email = $_POST['email'];
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
      $comandoSql = "insert into cpf (id, nome, cpf, senha, email, criado) value (default, '$nome', '$cpf', '$senha', '$email', now())";
      $insereUser = mysqli_query($con, $comandoSql);

      if(mysqli_affected_rows($con)){
        $_SESSION['msg']= "<p style='color: green'>CPF VALIDO!</p>";
        $_SESSION['cpf']= $cpf;
        header("location: result_cpf.php");
      }else{
        $_SESSION['msg'] = "<p style='color: red'>CPF INVALIDO! <br> erro ao salvar no banco de dados</p>";
        $_SESSION['cpf']= $cpf;
        header("location: cad_cpf.php");
      }
    }else{
      $_SESSION['msg'] = "<p style='color: red'>CPF INVALIDO! <br> numeraçao errada</p>";
      $_SESSION['cpf']= $cpf;
      header("location: cad_cpf.php");
    }
    
  }
?>