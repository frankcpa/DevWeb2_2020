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
                <?php
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=devweb2", "root", "root123");
                } catch (PDOException $e) {
                    die("Não foi possível conectar. " . $e->getMessage());
                }

                try {
                    $sql = "SELECT * FROM aluno";
                    $resultado = $pdo->query($sql);
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">E-mail</th>
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
                                    echo "</tr>";
                                }
                                unset($resultado);
                            } else {
                                echo "Nenhum registro encontrado.";
                            } ?>
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