<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastro_PHP</title>
  <link rel="stylesheet" href="style.css"></head>
<body>
  <h1>VERIFICADOR DE CPF</h1>

  <?php
    session_start();

    // $_SESSION=['msg'];

    if(isset($_SESSION['msg'])){
      echo $_SESSION['cpf'];
      echo $_SESSION['msg'];
      unset($_SESSION['cpf']);
      unset($_SESSION['msg']);
    }
  ?>

  <form action="proc_cpf.php" method="post">
    <label for="">CPF:</label>
    <input type="number" autofocus name="cpf">
    <label for="">Nome Completo:</label>
    <input type="text" autofocus name="nome">
    <input type="submit">
  </form>

  <a href="index.php">Voltar</a>
</body>
</html>