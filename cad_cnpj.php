<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastro_PHP</title>
  <link rel="stylesheet" href="style.css"></head>
<body>
  <h1>VERIFICADOR DE CNPJ</h1>

  <?php
    session_start();

    // $_SESSION=['msg'];

    if(isset($_SESSION['msg'])){
      echo $_SESSION['cnpj'];
      echo $_SESSION['msg'];
      unset($_SESSION['cnpj']);
      unset($_SESSION['msg']);
    }
  ?>

  <form action="proc_cnpj.php" method="post">
    <label for="">CPNJ:</label>
    <input type="number" autofocus name="cnpj">
    <label for="">Nome da Empresa:</label>
    <input type="text" autofocus name="nome">
    <label for="">CEP:</label>
    <input type="number" autofocus name="cep">
    <label for="">Numero:</label>
    <input type="text" autofocus name="numero">
    <input type="submit">
  </form>
  
  <a href="index.php">Voltar</a>
</body>
</html>