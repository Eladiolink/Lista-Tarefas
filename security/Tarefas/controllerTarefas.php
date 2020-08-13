<?php

require_once "./conexao.php";


if(isset($_POST['type']) && $_POST['type']=='All'){
  pesquisarAll($_POST['id']);

}elseif(isset($_POST['type'])){
  pesquisar($_POST['id'],$_POST['type']);
}



function pesquisarAll($id){
  $conexao=new Conexao();
  $conectar=$conexao->conectar();
  $query='SELECT tarefa,situacao_tarefa,id_tarefa FROM tb_tarefas WHERE id_usuario=:id';
  $stmt=$conectar->prepare($query);
  $stmt->bindValue(':id',$id);
  $stmt->execute();
  $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($resultado);
}


  function pesquisar($id,$situacao){
      $conexao=new Conexao();
      $conectar=$conexao->conectar();
      $query='SELECT tarefa,situacao_tarefa,id_tarefa FROM tb_tarefas WHERE id_usuario=:id AND situacao_tarefa=:situacao';
      $stmt=$conectar->prepare($query);
      $stmt->bindValue(':id',$id);
      $stmt->bindValue(':situacao',$situacao);
      $stmt->execute();
      $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($resultado);
  }
  

  if(isset($_POST['action']) && $_POST['action']=='check'){
    $conexao=new Conexao();
    $conectar=$conexao->conectar();
    $query='UPDATE tb_tarefas SET situacao_tarefa="Finalizada" WHERE id_tarefa=:id_tarefa';
      $stmt=$conectar->prepare($query);
      $stmt->bindValue(':id_tarefa',$_POST['value']);
      $stmt->execute();
  }elseif(isset($_POST['action']) && $_POST['action']=='trash'){
    $conexao=new Conexao();
    $conectar=$conexao->conectar();
    $query='DELETE FROM tb_tarefas WHERE id_tarefa=:id_tarefa';
      $stmt=$conectar->prepare($query);
      $stmt->bindValue(':id_tarefa',$_POST['value']);
      $stmt->execute();
  }elseif(isset($_POST['action']) && $_POST['action']=='edit'){
    $conexao=new Conexao();
    $conectar=$conexao->conectar();
    $query='UPDATE tb_tarefas SET tarefa=:tarefa WHERE id_tarefa=:id_tarefa';
      $stmt=$conectar->prepare($query);
      $stmt->bindValue(':id_tarefa',$_POST['id_tarefa']);
      $stmt->bindValue(':tarefa',$_POST['value']);
      $stmt->execute();
  }elseif(isset($_POST['action']) && $_POST['action']=='remove'){
    $conexao=new Conexao();
    $conectar=$conexao->conectar();
    $query='DELETE FROM tb_tarefas WHERE situacao_tarefa="Finalizada"';
      $stmt=$conectar->query($query);
      echo json_encode('Deletadas');
  }
  
?>