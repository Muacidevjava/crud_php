<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Pessoas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Lista de Pessoas</h1>
        <nav>
            <a href="cadastrar.php" id="cadastrar">Cadastrar</a>
        </nav>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "conexao.php";

                $sql = "SELECT * FROM pessoas";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($linha = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $linha["id"] . "</td>";
                        echo "<td>" . $linha["nome"] . "</td>";
                        echo "<td>" . $linha["idade"] . "</td>";
                        echo "<td>" . $linha["email"] . "</td>";
                        echo "<td>";
                        echo "<a href='editar.php?id=" . $linha["id"] . "'>Editar</a> | ";
                        echo "<a href='excluir.php?id=" . $linha["id"] . "'>Excluir</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum dado encontrado.</td></tr>";
                }

                $conexao->close();
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2023 CRUD de Pessoas</p>
    </footer>
</body>
</html>