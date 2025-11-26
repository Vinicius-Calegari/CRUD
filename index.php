<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"> </script>
</head>
<body>
    <div class="container">

        <h1 class="titulo">Lista de Clientes</h1>
        
        <section class="card">
            <h2>Cadastrar Novo Cliente</h2>

            <form method="POST" action="cadastrar.php" class="formulario">

                <div class="campo">
                    <label>Nome completo:</label>
                    <input type="text" name="nome_completo" required>
                </div>

                <div class="campo">
                    <label>Data de nascimento:</label>
                    <input type="date" name="data_nascimento" required>
                </div>

                <div class="campo">
                    <label>Telefone:</label>
                    <input type="text" name="telefone" required>
                </div>

                <div class="campo">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>

                <div class="campo">
                    <label>Endereço:</label>
                    <input type="text" name="endereco" required>
                </div>

                <div class="campo">
                    <label>Serviço preferido:</label>
                    <input type="text" name="servico_preferido" required>
                </div>

                <button type="submit" class="btn">Cadastrar</button>
            </form>
        </section>

        <section class="card">
            <h2>Clientes Cadastrados</h2>

            <table class="tabela">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Serviço</th>
                    <th>Ações</th>
                </tr>

                <?php
                $sql_lista = "SELECT * FROM cliente";
                $result = $conn->query($sql_lista);

                if ($result && $result->num_rows > 0) {
                    while ($linha = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$linha['ID']}</td>";
                        echo "<td>{$linha['nome_completo']}</td>";
                        echo "<td>{$linha['telefone']}</td>";
                        echo "<td>{$linha['email']}</td>";
                        echo "<td>{$linha['Servico_preferido']}</td>";
                        echo "<td class='acoes'>
                                <a class='editar' href='editar.php?id={$linha['ID']}'>Editar</a>
                                <a class='excluir' href='excluir.php?id={$linha['ID']}'>Excluir</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum cliente cadastrado ainda.</td></tr>";
                }
                ?>
            </table>
        </section>

    </div>
</body>
</html>
