<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=devweb2", "root", "root123");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../aula0403web2/modelo/aluno.php");
        $aluno = new aluno();

        $aluno->setNome($_POST['nome']);
        $aluno->setIdade($_POST['idade']);
        $aluno->setEmail($_POST['email']);
        $aluno->setRA($_POST['ra']);

        $sql = "INSERT INTO aluno (nome, idade) VALUES ('" . $aluno->getNome() ."', '" . $aluno->getIdade() . "')";
        $pdo->exec($sql);
        echo "Inserido com sucesso.";
    } catch(PDOException $e) {
        die("Não foi possível executar o script: $sql. " . $e->getMessage());
    }
?>