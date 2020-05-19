<html>
    <head>
        <link rel="stylesheet" href="bootstrap-4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Primeira Atividade de Web2</h1>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <ul>
                        <li>Link 1</li>
                        <li>Link 2</li>
                        <li>Link 3</li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <h4>Cadastro de Aluno</h4>
                    <form method="POST" action="salvaraluno.php">
                        <div class="form-group">
                            <label for="nomeID">Nome</label>
                            <input requerid name="nome" id="nomeID" class="form-control" type="text" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="idadeID">Idade</label>
                                <input id="idadeID" name="idade" class="form-control" type="number" />
                            </div>
                            <div class="form-group col-md-10">
                                <label for="emailID">E-Mail</label>
                                <input name="email" placeholder="fulano@gmail.com" id="emailID" class="form-control" type="email" />
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Salvar" />
                    </form>
                </div>
            </div>
            <div class="row">
                <p>Todos os direitos reservados a turma 32211</p>
            </div>
        </div>
    </body>
</html>