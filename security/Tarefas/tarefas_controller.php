<?php
require_once 'conexao.php';
$conexao=new Conexao();
$conectar=$conexao->conectar();

if( isset($_GET['action'])  && $_GET['action']=='add'){
  $query='INSERT INTO tb_tarefas (id_usuario,tarefa) VALUES (:id,:tarefa)';
   $stmt=$conectar->prepare($query);
   $stmt->bindValue(':id',$_GET['id']);
   $stmt->bindValue('tarefa',$_GET['tarefa']);
   $stmt->execute();

}

function pesquisar($id){
    $conexao=new Conexao();
    $conectar=$conexao->conectar();
    $query='SELECT tarefa,situacao_tarefa FROM tb_tarefas WHERE id_usuario=:id';
    $stmt=$conectar->prepare($query);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($resultado);
    return $resultado;
}

?>