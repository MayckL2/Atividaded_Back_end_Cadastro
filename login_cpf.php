<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  session_start();

  if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
  <h1>LOGIN - CPF</h1>

  <form action="proc_login.php" method="post">
    <label for="">Email</label>
    <input type="text" name="email">
    <label for="">Senha</label>
    <input type="password" name="senha">

    <input type="submit">
  </form>

  <a href="cad_cpf.php">Voltar</a>
</body>
</html>