<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastro_PHP</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  session_start();
  include_once("conexao.php");

  // $_SESSION=['msg'];

  if (isset($_SESSION['msg'])) {
    echo $_SESSION['cpf'];
    echo $_SESSION['msg'];
    unset($_SESSION['cpf']);
    unset($_SESSION['msg']);
  }
  ?>

  <br>
  <a href="index.php">Voltar</a>

  <?php
  $result_usuarios = "select * from cpf";
  $resultado_usuarios = mysqli_query($con, $result_usuarios);
  while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
    echo "<hr>";
    echo "<div class='user'>";
    echo "<p>ID: " . $row_usuario['id'] . "</p>";
    echo "<p>Nome: " . $row_usuario['nome'] . "</p>";
    echo "<p>CPF: " . $row_usuario['cpf'] . "</p>";
    echo "<p>Email: " . $row_usuario['email'] . "</p>";
    echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a>";
    echo "<a href='pro_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a>";
    echo "</div>";
  }
  ?>
</body>

</html>