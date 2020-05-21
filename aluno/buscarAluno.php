<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=devweb2", "root", "root123");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        $sql = "SELECT * FROM aluno";
        $resultado = $pdo->query($sql);
        if($resultado->rowCount() > 0) {
            while($row = $resultado->fetch()) {
                echo "Nome: " . $row['nome'];
            }
            unset($resultado);
        } else{
            echo "Nenhum registro encontrado.";
        }
    } catch(PDOException $e) {
        die("Não foi possível executar o script: $sql. " . $e->getMessage());
    }
?>