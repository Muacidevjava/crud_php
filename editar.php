<?php
include "conexao.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];

  $sql = "SELECT * FROM pessoas WHERE id = $id";
  $resultado = $conexao->query($sql);

  if ($resultado->num_rows == 1) {
    $linha = $resultado->fetch_assoc();
    $nome = $linha["nome"];
    $idade = $linha["idade"];
    $email = $linha["email"];
  } else {
    echo "Pessoa não encontrada.";
    exit();
  }
} else {
  echo "ID da pessoa não especificado.";
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];
  $email = $_POST["email"];

  $sql = "UPDATE pessoas SET nome = '$nome', idade = '$idade', email = '$email' WHERE id = $id";

  if ($conexao->query($sql) === TRUE) {
    echo "Dados da pessoa atualizados com sucesso!";
  } else {
    echo "Erro ao atualizar dados da pessoa: " . $conexao->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar Pessoa</title>
</head>

<body >
  <h1>Editar Pessoa</h1>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>
    Idade: <input type="number" name="idade" value="<?php echo $idade; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $email; ?>" required><br>
    <input type="submit" value="Salvar Alterações">
  </form>

  <a href="index.php">Voltar para a lista</a>
</body>

</html>

<?php
$conexao->close();
?>