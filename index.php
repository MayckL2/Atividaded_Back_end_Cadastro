<?php
if (isset($_POST['op'])) {
  if ($_POST['op'] == 'cpf') {
    header("location: cad_cpf.php");
  } else {
    header("location: cad_cnpj.php");
  }
}
?>
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

  if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
?>
<h1>CADASTRAR</h1>

  <form action="#" method="post" class="escolha">
    <input type="radio" id="pessoafisica" name="op" value="cpf">
    <label for="pessoafisica">Pessoa fisica</label>
    <input type="radio" id="pessoajuridica" name="op" value="cnpj">
    <label for="pessoajuridica">Pessoa juridica</label>

    <input type="submit">
  </form>
</body>

</html>