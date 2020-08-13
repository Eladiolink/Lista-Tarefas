<?php
print_r($_POST);
require_once "conexao.php";

$conexao=new Conexao();
$conectar=$conexao->conectar();
$query="SELECT id_usuario,email,senha FROM tb_usuario WHERE email=:email";
$stmt=$conectar->prepare($query);
$stmt->bindValue(':email',$_POST['email']);
$stmt->execute();
$response=$stmt->fetchAll(PDO::FETCH_NUM);


$verifyPassword=password_verify($_POST['senha'],$response[0][2]);
$quantidadeUser=count($response);

if($quantidadeUser==0){
  header("Location:../../Tarefas/singIn.php?log=notExist");
}elseif($verifyPassword){
  header("Location:../../Tarefas/home.php");
  session_start();
  $_SESSION['login']=true;
  $_SESSION['id_usuario']=$response[0][0];
}else{
  header("Location:../../Tarefas/singIn.php?log=pass");
  session_destroy();
}
?>