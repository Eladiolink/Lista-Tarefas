/*DATABASE Tarefas*/
CREATE DATABASE Tarefas;


/*TABLE tb_usuario*/
CREATE TABLE tb_usuario(
  id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(20) NOT NULL,
  sobrenome VARCHAR(50) NOT NULL,
  sexo VARCHAR(1) NOT NULL,
  email VARCHAR(60) NOT NULL,
  senha VARCHAR(256) NOT NULL
);

/*TABLE tb_tarefas*/

CREATE TABLE tb_tarefas(
  id_tarefa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tarefa VARCHAR(1000) NOT NULL,
  data_inserida DATETIME DEFAULT CURRENT_TIMESTAMP,
  id_usuario INT NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario),
  situacao_tarefa VARCHAR(10) DEFAULT 'Pendente'
);
