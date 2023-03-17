<?php
  include_once("conexao.php");
  session_start();

  $email = $_POST['email'];
  $senha = md5($_POST['senha']);

  $comandoSql= "select email from cpf where '$email' = email";
  $resultado_usuario= mysqli_query($con, $comandoSql);
  
  if(mysqli_affected_rows($con)){
    

    $comandoSql= "select senha from cpf where '$senha' = senha";
    $resultado_usuario= mysqli_query($con, $comandoSql);

    if(mysqli_affected_rows($con)){
      $_SESSION['msg']= "<p style='color:green;'>USUARIO LOGADO</p>";
      header("location: index.php");
    }else{
      $_SESSION['msg']= "<p style='color:red;'>USUARIO NAO EXISTE</p>";
      header("location: cad_cpf.php");
  }
  }else{
    $_SESSION['msg']= "<p style='color:red;'>USUARIO NAO EXISTE</p>";
    header("location: cad_cpf.php");
  }
?>