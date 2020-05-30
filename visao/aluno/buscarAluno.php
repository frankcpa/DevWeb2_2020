<html>

<head>
    <link rel="stylesheet" href="/aula0403web2/recursos/bootstrap-4.1/css/bootstrap.min.css">
    <script src="/aula0403web2/recursos/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="/aula0403web2/recursos/bootstrap-4.1/js/popper.min.js"></script>
    <script src="/aula0403web2/recursos/bootstrap-4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <?php include "../layout/cabecalhoNav.php"; ?>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4>Buscar Alunos</h4>
                <form class="form-inline" method="POST" action="buscarAluno.php">
                    <div class="form-group mb-2 col-md-1">
                        <label for="lblNome" class="sr-only">lblNome</label>
                        <input type="text" readonly class="form-control-plaintext" id="lblNome" value="Nome:">
                    </div>
                    <div class="form-group mb-2 col-md-3">
                        <label for="nome" class="sr-only">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </form>
                <?php
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=devweb2", "root", "root123");
                } catch (PDOException $e) {
                    die("Não foi possível conectar. " . $e->getMessage());
                }

                try {
                    $sql = "SELECT * FROM aluno";
                    if ($_POST) {
                        if (!empty($_POST['nome'])) {
                            $sql = "SELECT * FROM aluno where nome like '%" . $_POST['nome'] . "%'";
                        }
                    }
                    $resultado = $pdo->query($sql);
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">#</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($resultado->rowCount() > 0) {
                                while ($row = $resultado->fetch()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['idaluno'] . "</td>";
                                    echo "<td>" . $row['nome'] . "</td>";
                                    echo "<td>" . $row['cpf'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                            ?>
                                    <td>
                                        <form method="POST" action="editarAluno.php">
                                            <input type="hidden" name="idaluno" value="<?php echo $row['idaluno']; ?>" />
                                            <button type="submit" class="btn btn-alert">Editar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="/aula0403web2/repositorio/daoExcluirAluno.php">
                                            <input type="hidden" name="idaluno" value="<?php echo $row['idaluno']; ?>" />
                                            <button type="submit" onclick="return confirm('Deseja realmente excluir o registro?')" class="btn btn-danger">Remover</button>
                                        </form>
                                    </td>
                            <?php
                                    echo "</tr>";
                                }
                                unset($resultado);
                            } else {
                                echo "Nenhum registro encontrado.";
                            } 
                            ?>
                        </tbody>
                    </table>
                <?php
                } catch (PDOException $e) {
                    die("Não foi possível executar o script: $sql. " . $e->getMessage());
                }
                ?>
            </div>
        </div>
        <?php include "../layout/rodape.php"; ?>
    </div>
</body>

</html>