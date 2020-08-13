<?php
  
class Conexao{
    private $host='mysql:host=localhost;dbname=Tarefas';
    private $user='root';
    private $pass='';

    public function conectar(){
        try{
          $conexao=new PDO($this->host,$this->user,$this->pass);

          return $conexao;
        }catch(PDOException $e){
            echo "<strong>Erro:</strong>".$e->getMessage()."";
        }
    }
}
?>