<?php
session_start();
if (!isset($_SESSION["login"])){
    echo "<script>alert('Você deve estar logado para abrir essa página');</script>";
    header("refresh:0;url=/aula0403web2/visao/login.php");
}
?>
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
                <h4>Cadastro de Aluno</h4>
                <form method="POST" action="/aula0403web2/repositorio/daoSalvaraluno.php">
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="nomeID">Nome</label>
                            <input requerid name="nome" id="nomeID" class="form-control" type="text" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cpf">CPF</label>
                            <input id="cpf" name="cpf" class="form-control" type="number" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="idadeID">Idade</label>
                            <input id="idadeID" name="idade" class="form-control" type="number" />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="raID">RA</label>
                            <input id="raID" name="ra" class="form-control" type="number" />
                        </div>
                        <div class="form-group col-md-8">
                            <label for="emailID">E-Mail</label>
                            <input name="email" placeholder="fulano@gmail.com" id="emailID" class="form-control" type="email" />
                        </div>
                    </div>
                    <div class="form-row">
                        <?php
                        try {
                            $pdo = new PDO("mysql:host=localhost;dbname=devweb2", "root", "root123");
                        } catch (PDOException $e) {
                            die("Não foi possível conectar. " . $e->getMessage());
                        }
                        ?>
                        <div class="form-group col-md-3">
                            <label for="estadoorigem">Estado</label>
                            <select class="form-control" id="estadoorigem" name="estadoorigem">
                                <?php
                                try {
                                    //Primeiro Select -------------------------------------------
                                    $sql = "SELECT * FROM estado";
                                    $resultado = $pdo->query($sql);
                                    if ($resultado->rowCount() > 0) {
                                        while ($row = $resultado->fetch()) {
                                            echo utf8_encode("<option value=\"" . $row['id'] . "\">" . $row['nome'] . "</option>");
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
                                        while ($row = $resultado->fetch()) {
                                            echo utf8_encode("<option value=\"" . $row['id'] . "\">" . $row['nome'] . "</option>");
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
                            <input name="login" id="login" class="form-control" type="text" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="senha">Senha</label>
                            <input name="senha" id="senha" class="form-control" type="password" />
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Salvar" />
                </form>
            </div>
        </div>
        <?php include "../layout/rodape.php"; ?>
    </div>
</body>

</html>