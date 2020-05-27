<?php
include("pessoa.php");
class aluno extends pessoa{
    private $ra;

    public function getRA(){
        return $this->ra;
    }
    public function setRA($ra){
        $this->ra = $ra;
    }
}
?>