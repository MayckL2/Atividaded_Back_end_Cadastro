<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastro_PHP</title>
  <link rel="stylesheet" href="style.css"></head>
<body>
  <?php
    session_start();

    if(isset($_SESSION)){
      echo $_SESSION['msg'];
      echo $_SESSION['cnpj'];
      unset($_SESSION['msg']);
      unset($_SESSION['cnpj']);
    }

  ?>
  <br>
  <a href="index.php">Voltar</a>
</body>
</html>