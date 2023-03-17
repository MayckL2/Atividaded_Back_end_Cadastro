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
  include_once("conexao.php");
  session_start();

  if (!empty($_SESSION)) {
    echo $_SESSION['msg'];
    echo $_SESSION['cnpj'];
    unset($_SESSION['msg']);
    unset($_SESSION['cnpj']);
  }

  $result_usuarios = "select * from cnpj";
  $resultado_usuarios = mysqli_query($con, $result_usuarios);
  while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
    echo "<hr>";
    echo "<div class='user'>";
    echo "<p>ID: " . $row_usuario['id'] . "</p>";
    echo "<p>Nome da Empresa: " . $row_usuario['nomeEmpresa'] . "</p>";
    echo "<p>CNPJ: " . $row_usuario['cnpj'] . "</p>";
    echo "<p>Rua: ". $row_usuario['rua']. "</p>";
    echo "<p>Bairro: ". $row_usuario['bairro']. "</p>";
    echo "<p>Cidade: ". $row_usuario['cidade']. "</p>";
    echo "<p>Estado: ". $row_usuario['uf']. "</p>";
    echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a>";
    echo "<a href='pro_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a>";
    echo "</div>";
  }
  echo "<hr>";
  ?>
  <br>
  <a href="index.php">Voltar</a>
</body>

</html>