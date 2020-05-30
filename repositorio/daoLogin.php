<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=devweb2", "root", "root123");
} catch (PDOException $e) {
    die("Não foi possível conectar. " . $e->getMessage());
}

try {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $logado = true;
    $sql = "select * from aluno where login = '" . $login . "'";
    $resultado = $pdo->query($sql);
    if ($resultado->rowCount() > 0) {
        $aluno = $resultado->fetch();
        if ($aluno['senha'] == $senha) {
            session_start();
            $_SESSION["login"] = $login;
            $_SESSION["nome"] = $aluno['nome'];
        } else {
            $logado = false;
            echo "<script>alert('Senha incorreta!');</script>";
        }
    } else {
        $logado = false;
        echo "<script>alert('Login não encontrado!');</script>";
    }
} catch (PDOException $e) {
    echo "Inserido com sucesso." . $sql . " --------- " . $e->getMessage();
}
if($logado){
    header("refresh:0;url=/aula0403web2/index.php");
}else{
    header("refresh:0;url=/aula0403web2/visao/login.php");
}