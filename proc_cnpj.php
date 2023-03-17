<?php
  session_start();
  include_once("conexao.php");

  // $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_NUMBER_INT);
  $cnpj = $_POST['cnpj'];
  $nome = $_POST['nome'];
  $cep = $_POST['cep'];
  $rua = $_POST['rua'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['cidade'];
  $uf = $_POST['uf'];
  $ibge = $_POST['ibge'];
  $numero = $_POST['numero'];
  $nums = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  $soma = 0;


  if(strlen($cnpj) == 0 or strlen($cnpj) > 14){
    $_SESSION['msg'] = "<p style='color: red'>CNPJ INVALIDO! <br> quantidade digitos invalida</p>";
    header("location: index.php");
  }else{

    // VERIFICAÇAO DO PRIMEIRO DIGITO
    for ($i=0; $i < 12; $i++) { 
      $soma += $nums[$i] * $cnpj[$i];
    }
    $ultima1 = 11 - ($soma%11);

    // VERIFICAÇÃO DO SEGUNDO DIGITO
    $nums = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    $soma = 0;

    for ($i=0; $i < 13; $i++) { 
      $soma += $nums[$i] * $cnpj[$i];
    }

    $ultima2 = 11 - ($soma%11);

    if($cnpj[12] == $ultima1 and $cnpj[13] == $ultima2){
      $comandoSql = "insert into cnpj (id, nomeEmpresa, cnpj, cep, rua, bairro, cidade, uf, ibge, numero, criado) value (default, '$nome', '$cnpj', '$cep', '$rua', '$bairro', '$cidade', '$uf', '$ibge', '$numero', now())";
      $insereUser = mysqli_query($con, $comandoSql);
      
      if(mysqli_affected_rows($con)){
        $_SESSION['msg']= "<p style='color: green'>CNPJ VALIDO!</p>";
        $_SESSION['cnpj']= $cnpj;
        header("location: result_cnpj.php");
      }else{
        $_SESSION['msg'] = "<p style='color: red'>CNPJ INVALIDO! <br> erro ao cadastrar no banco de dados</p>";
        header("location: cad_cnpj.php");
      }
    }else{
      $_SESSION['msg'] = "<p style='color: red'>CNPJ INVALIDO! <br> numeraçao errada</p>";
      $_SESSION['cnpj']= $cnpj;
      header("location: cad_cnpj.php");
    }


  }
?>