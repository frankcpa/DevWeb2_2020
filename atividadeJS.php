<html>

<head>
    <link rel="stylesheet" href="/aula0403web2/bootstrap-4.1/css/bootstrap.min.css">
    <script src="/aula0403web2/arquivos/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="/aula0403web2/arquivos/bootstrap-4.1/js/popper.min.js"></script>
    <script src="/aula0403web2/arquivos/bootstrap-4.1/js/bootstrap.min.js"></script>
    <script>
        function somar() {
            let primeiroValor = parseInt(document.getElementById('valor1').value);
            let segundoValor = parseInt(document.getElementById('valor2').value);
            alert(primeiroValor + segundoValor);
        }

        function teste() {
            alert("passei o mouse por aqui");
        }
    </script>
</head>

<body>
    <div class="container">
        <?php include "visao/layout/cabecalhoNav.php"; ?>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4>Atividade JavaScript</h4>
                <div class="form-inline">
                    <div class="form-group mb-2">
                        <label for="valor1">Valor 1</label>
                        <input requerid id="valor1" class="form-control" type="number" />
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="valor2">Valor 2</label>
                        <input id="valor2" onblur="teste()" class="form-control" type="number" />
                    </div>
                    <input class="btn btn-primary mb-2" onclick="somar()" type="button" value="Somar os dois Valores" />
                </div>
            </div>
        </div>
        <?php include "visao/layout/rodape.php"; ?>
    </div>
</body>

</html>