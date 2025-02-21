<?php
$servidor = "localhost"; // O servidor do seu banco de dados (geralmente localhost)
$usuario = "root"; // O usuário do seu banco de dados (geralmente root)
$senha = ""; // A senha do seu banco de dados (deixe em branco se não tiver senha)
$banco = "meu_crud"; // O nome do banco de dados que você criou

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

echo "Conexão bem-sucedida!";
?>