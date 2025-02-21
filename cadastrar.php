<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];
  $email = $_POST["email"];

  $sql = "INSERT INTO pessoas (nome, idade, email) VALUES ('$nome', '$idade', '$email')";

  if ($conexao->query($sql) === TRUE) {
    echo "Pessoa cadastrada com sucesso!";
  } else {
    echo "Erro ao cadastrar pessoa: " . $conexao->error;
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title class="titulo">Cadastrar Pessoa</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header>
    <h1>Cadastrar Nova Pessoa</h1>
  </header>

  <main>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" required><br>

      <label for="idade">Idade:</label>
      <input type="number" name="idade" id="idade" required><br>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required><br>

      <input type="submit" value="Cadastrar" id="cadastrar">

      
        <a href="index.php"  class="botao">Voltar para a lista</a>

    
    </form>


  </main>

  <footer>
    <p>&copy; 2023 CRUD de Pessoas</p>
  </footer>
</body>

</html>

<?php
$conexao->close();
?>