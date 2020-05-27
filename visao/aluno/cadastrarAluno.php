<html>

<head>
    <link rel="stylesheet" href="/aula0403web2/arquivos/bootstrap-4.1/css/bootstrap.min.css">
    <script src="/aula0403web2/arquivos/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="/aula0403web2/arquivos/bootstrap-4.1/js/popper.min.js"></script>
    <script src="/aula0403web2/arquivos/bootstrap-4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <?php include "../layout/cabecalhoNav.php"; ?>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4>Cadastro de Aluno</h4>
                <form method="POST" action="daoSalvaraluno.php">
                    <div class="form-group">
                        <label for="nomeID">Nome</label>
                        <input requerid name="nome" id="nomeID" class="form-control" type="text" />
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
                    <input class="btn btn-primary" type="submit" value="Salvar" />
                </form>
            </div>
        </div>
        <?php include "../layout/rodape.php"; ?>
    </div>
</body>

</html>