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
  <h1>CADASTRAR CNPJ</h1>

  <?php
  session_start();
  include_once("conexao.php");

  // $_SESSION=['msg'];

  if (isset($_SESSION['msg'])) {
    echo $_SESSION['cnpj'];
    echo $_SESSION['msg'];
    unset($_SESSION['cnpj']);
    unset($_SESSION['msg']);
  }
  ?>

  <form action="proc_cnpj.php" method="post">
    <label for="">CPNJ:</label>
    <input type="number" autofocus required name="cnpj">
    <label for="">Nome da Empresa:</label>
    <input type="text" autofocus required name="nome">
    <label for="">CEP:</label>
    <input type="number" id="cep" onblur="pesquisacep(this.value)" autofocus name="cep">
    <label for="">Rua:</label>
    <input type="text" id="rua" autofocus name="rua">
    <label for="">Bairro:</label>
    <input type="text" id="bairro" autofocus name="bairro">
    <label for="">Cidade:</label>
    <input type="text" id="cidade" autofocus name="cidade">
    <label for="">Estado:</label>
    <input type="text" id="uf" autofocus name="uf">
    <label for="">IBGE:</label>
    <input type="text" id="ibge" autofocus name="ibge">
    <label for="">Numero:</label>
    <input type="text" autofocus name="numero">
    <input type="submit">
  </form>

  <a href="index.php">Voltar</a>

  <?php

  $pagina_atual= filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
  $pagina= (!empty($pagina_atual)) ? $pagina_atual : 1;

  //configurar a quantidade de itens por pagina
  $qnt_result_pg= 3;

  //calcular o inicio visualizado
  $inicio= ($qnt_result_pg * $pagina) - $qnt_result_pg;

  $result_usuarios= "select * from cnpj limit $inicio, $qnt_result_pg";
  $resultado_usuarios= mysqli_query($con, $result_usuarios);
  while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
    echo "<hr>";
    echo "<div class='user'>";
    echo "<p>ID: ". $row_usuario['id']. "</p>";
    echo "<p>Nome da Empresa: ". $row_usuario['nomeEmpresa']. "</p>";
    echo "<p>CNPJ: ". $row_usuario['cnpj']. "</p>";
    echo "<p>Rua: ". $row_usuario['rua']. "</p>";
    echo "<p>Bairro: ". $row_usuario['bairro']. "</p>";
    echo "<p>Cidade: ". $row_usuario['cidade']. "</p>";
    echo "<p>Estado: ". $row_usuario['uf']. "</p>";
    echo "<p>Numero: ". $row_usuario['numero']. "</p>";
    echo "<a href='edit_usuario.php?id=". $row_usuario['id']. "'>Editar</a>";
    echo "<a href='pro_apagar_usuario.php?id=". $row_usuario['id']. "'>Apagar</a>";
    echo "</div>";
  }
  echo "<hr>";

  //Paginaçao - soma quantidade de usuarios:
  $result_pg = "select count(id) as num_result from cnpj";
  $resultado_pg= mysqli_query($con, $result_pg);
  $row_pg = mysqli_fetch_assoc($resultado_pg);

  $quantidade_pg= ceil($row_pg['num_result'] / $qnt_result_pg);

  //limita os links antes e depois
  $max_links= 2;
  echo "<div class='pags'>";
  echo "<a href= 'cad_cnpj.php?pagina=1'>Primeira</a>";

  for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
    if($pag_ant >= 1){
      echo "<a href= 'cad_cnpj.php?pagina=$pag_ant'>$pag_ant</a>";
    }
  }

  echo $pagina;

  for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
    if($pag_dep <= $quantidade_pg){
      echo "<a href= 'cad_cnpj.php?pagina=$pag_dep'>$pag_dep</a>";
    }
  }

  echo "<a href= 'cad_cnpj.php?pagina=$quantidade_pg'>Ultima</a>";
  echo "</div>"
  ?>

<script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
</body>

</html>