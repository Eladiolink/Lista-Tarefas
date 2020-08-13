<?php
require_once "./conexao.php";

function validation(){
    $conexao=new Conexao();
    $conectar=$conexao->conectar();

    $query='SELECT email FROM tb_usuario WHERE email=:email';
    $stmt=$conectar->prepare($query);
    $stmt->bindValue(':email',$_POST['email']);
    $stmt->execute();
     
    if(count($stmt->fetchAll())==0){
       create($conectar);
    }else{
        header('Location:../../Tarefas/singIn.php?erro=exist');
    }

}

function create($conectar){
    $pass=password_hash($_POST['senha'],PASSWORD_DEFAULT);

    $query='INSERT INTO tb_usuario (nome,sobrenome,sexo,email,senha) VALUES (:nome,:sobrenome,:sexo,:email,:pass)';
    $stmt=$conectar->prepare($query);
    $stmt->bindValue(':nome',$_POST['nome']);
    $stmt->bindValue(':sobrenome',$_POST['sobrenome']);
    $stmt->bindValue(':sexo',$_POST['sexo']);
    $stmt->bindValue(':email',$_POST['email']);
    $stmt->bindValue(':pass',$pass);
    $stmt->execute();
    
  header('Location:../../Tarefas/singIn.php?log=cadastrado');
}

validation();
?>