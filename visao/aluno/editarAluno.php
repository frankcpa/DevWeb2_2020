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
                <h4>Editar de Aluno</h4>
                <form method="POST" action="/aula0403web2/repositorio/daoEditarAluno.php">
                    <?php
                    try {
                        $pdo = new PDO("mysql:host=localhost;dbname=devweb2", "root", "root123");
                    } catch (PDOException $e) {
                        die("Não foi possível conectar. " . $e->getMessage());
                    }
                    try {
                        if ($_POST) {
                            if (!empty($_POST['idaluno'])) {
                                $sql = "SELECT * FROM aluno where idaluno = '" . $_POST['idaluno'] . "'";
                            }
                        } else {
                            echo "<script>alert('Não foi possível encontrar o aluno!');</script>";
                            header("refresh:0;url=/aula0403web2/visao/aluno/buscarAluno.php");
                        }
                        $resultado = $pdo->query($sql);
                        $row = $resultado->fetch();
                    ?>
                        <div class="form-row">
                            <input type="hidden" name="idaluno" value="<?php echo $row['idaluno']; ?>" />
                            <div class="form-group col-md-9">
                                <label for="nomeID">Nome</label>
                                <input requerid name="nome" id="nomeID" value="<?php echo $row['nome']; ?>" class="form-control" type="text" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cpf">CPF</label>
                                <input id="cpf" name="cpf" class="form-control" value="<?php echo $row['cpf']; ?>" type="number" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="idadeID">Idade</label>
                                <input id="idadeID" name="idade" value="<?php echo $row['idade']; ?>" class="form-control" type="number" />
                            </div>
                            <div class="form-group col-md-2">
                                <label for="raID">RA</label>
                                <input id="raID" name="ra" value="<?php echo $row['ra']; ?>" class="form-control" type="number" />
                            </div>
                            <div class="form-group col-md-8">
                                <label for="emailID">E-Mail</label>
                                <input name="email" value="<?php echo $row['email']; ?>" id="emailID" class="form-control" type="email" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="estadoorigem">Estado</label>
                                <select class="form-control" id="estadoorigem" name="estadoorigem">
                                    <?php
                                    try {
                                        //Primeiro Select -------------------------------------------
                                        $sql = "SELECT * FROM estado";
                                        $resultado = $pdo->query($sql);
                                        if ($resultado->rowCount() > 0) {
                                            while ($row2 = $resultado->fetch()) {
                                                if ($row2['id'] == $row['estadoorigem']) {
                                                    echo utf8_encode("<option selected value=\"" . $row2['id'] . "\">" . $row2['nome'] . "</option>");
                                                } else {
                                                    echo utf8_encode("<option value=\"" . $row2['id'] . "\">" . $row2['nome'] . "</option>");
                                                }
                                            }
                                            unset($resultado);
                                        } else {
                                            echo "<option value=\"0\">Sem Registros</option>";
                                        }
                                        //Fim do Primeiro Select -------------------------------------
                                    } catch (PDOException $e) {
                                        die("Não foi possível executar o script: $sql. " . $e->getMessage());
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cidadeorigem">Cidade</label>
                                <select class="form-control" id="cidadeorigem" name="cidadeorigem">
                                    <?php
                                    try {
                                        //Segundo Select -------------------------------------------
                                        $sql = "SELECT * FROM cidade";
                                        $resultado = $pdo->query($sql);
                                        if ($resultado->rowCount() > 0) {
                                            while ($row2 = $resultado->fetch()) {
                                                if ($row2['id'] == $row['cidadeorigem']) {
                                                    echo utf8_encode("<option selected value=\"" . $row2['id'] . "\">" . $row2['nome'] . "</option>");
                                                } else {
                                                    echo utf8_encode("<option value=\"" . $row2['id'] . "\">" . $row2['nome'] . "</option>");
                                                }
                                            }
                                            unset($resultado);
                                        } else {
                                            echo "<option value=\"0\">Sem Registros</option>";
                                        }
                                        //Fim do Segundo Select -------------------------------------
                                    } catch (PDOException $e) {
                                        die("Não foi possível executar o script: $sql. " . $e->getMessage());
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="login">Login</label>
                                <input name="login" id="login" value="<?php echo $row['login']; ?>" class="form-control" type="text" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="senha">Senha</label>
                                <input name="senha" id="senha" value="<?php echo $row['senha']; ?>" class="form-control" type="password" />
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Salvar" />
                    <?php
                    } catch (PDOException $e) {
                        echo "<script>alert('Não foi possível encontrar o aluno!');</script>";
                    }
                    ?>
                </form>
            </div>
        </div>
        <?php include "../layout/rodape.php"; ?>
    </div>
</body>

</html>