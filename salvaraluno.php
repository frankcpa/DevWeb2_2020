<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=devweb2", "root", "root123");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        $nomee = $_POST['nome'];
        $idadee =  $_POST['idade'];
        $emaill = $_POST['email'];

        $sql = "INSERT INTO aluno (nome, idade) VALUES ('" . $nomee ."', '" . $idadee . "')";
        $pdo->exec($sql);
        echo "Inserido com sucesso.";
    } catch(PDOException $e) {
        die("Não foi possível executar o script: $sql. " . $e->getMessage());
    }
?>