<?php
class pessoa{
    private $nome;
    private $idade;
    private $email;
    private $cpf;
    private $cidadeorigem;
    private $estadoorigem;
    private $login;
    private $senha;

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function getEstadoorigem(){
        return $this->estadoorigem;
    }
    public function setEstadoorigem($estadoorigem){
        $this->estadoorigem = $estadoorigem;
    }
    public function getCidadeorigem(){
        return $this->cidadeorigem;
    }
    public function setCidadeorigem($cidadeorigem){
        $this->cidadeorigem = $cidadeorigem;
    }
    public function getCPF(){
        return $this->cpf;
    }
    public function setCPF($cpf){
        $this->cpf = $cpf;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getIdade(){
        return $this->idade;
    }
    public function setIdade($idade){
        $this->idade = $idade;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
}
?>