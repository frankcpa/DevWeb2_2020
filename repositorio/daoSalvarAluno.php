<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=devweb2", "root", "root123");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../modelo/aluno.php");
        $aluno = new aluno();

        $aluno->setNome($_POST['nome']);
        $aluno->setIdade($_POST['idade']);
        $aluno->setEmail($_POST['email']);
        $aluno->setCPF($_POST['cpf']);
        $aluno->setCidadeorigem($_POST['cidadeorigem']);
        $aluno->setEstadoorigem($_POST['estadoorigem']);
        $aluno->setLogin($_POST['login']);
        $aluno->setSenha($_POST['senha']);

        

        $sql = "INSERT INTO aluno (nome, idade,cpf, email,cidadeorigem,estadoorigem,login,senha,ra)
        VALUES ('" . $aluno->getNome() ."','" . $aluno->getIdade() . "', '" . $aluno->getCPF() ."',
        '" . $aluno->getEmail() ."', '" . $aluno->getCidadeorigem() . "', '" . $aluno->getEstadoorigem() . "',
        '" . $aluno->getLogin() . "', '" . $aluno->getSenha() . "', '" . $aluno->getRA() . "')";
        $pdo->exec($sql);
        echo "Inserido com sucesso." ;
    } catch(PDOException $e) {
       echo "Inserido com sucesso." . $sql. " --------- ". $e->getMessage();
    }
?>