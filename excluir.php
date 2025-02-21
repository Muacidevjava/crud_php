<?php
include "conexao.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM pessoas WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "Pessoa excluída com sucesso!";
    } else {
        echo "Erro ao excluir pessoa: " . $conexao->error;
    }
} else {
    echo "ID da pessoa não especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Pessoa</title>
</head>
<body>
    <h1>Excluir Pessoa</h1>

    <p>Tem certeza que deseja excluir esta pessoa?</p>

    <a href="excluir.php?id=<?php echo $id; ?>">Sim, excluir</a> | 
    <a href="index.php">Não, voltar para a lista</a>
</body>
</html>

<?php
$conexao->close();
?>