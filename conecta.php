<?php
 
# Conexão com o banco de dados MySQL *****************************************
$servidor = "localhost";
$usuario = "root";
$senha = "";
$database = "meu_crud";
 
$conexao = mysqli_connect($servidor, $usuario, $senha, $database);
 
/*
# Criando tabelas usando PHP ************************************************
# Tabela cursos (nome do curso, carga horaria)
$query = "CREATE TABLE CURSOS(
	id_curso int not null auto_increment,
	nome_curso varchar(255) not null,
	carga_horaria int not null,
	primary key(id_curso)
)";
 
$executar = mysqli_query($conexao, $query);
 
# Tabela alunos (nome do aluno, data de nascimento)
$query = "CREATE TABLE ALUNOS(
	id_aluno int not null auto_increment,
	nome_aluno varchar(255) not null,
	data_nascimento varchar(255),
	primary key(id_aluno)
)";
 
$executar = mysqli_query($conexao, $query);
 
# Tabela alunos_cursos (aluno, curso)
$query = "CREATE TABLE ALUNOS_CURSOS(
	id_aluno_curso int not null auto_increment,
	id_aluno int not null,
	id_curso int not null,
	primary key(id_aluno_curso)
)";
 
$executar = mysqli_query($conexao, $query);
 
# Inserir dados nas tabelas **************************************
$query = "INSERT INTO ALUNOS(nome_aluno, data_nascimento) VALUES('Jose', '01-01-1990')";
 
$executar = mysqli_query($conexao, $query);
 
$query = "INSERT INTO ALUNOS(nome_aluno, data_nascimento) VALUES('Maria', '01-04-1991')";
 
$executar = mysqli_query($conexao, $query);
 
 
# Inserir cursos
$query = "INSERT INTO CURSOS(nome_curso, carga_horaria) VALUES('PHP E MYSQL', 10)";
$executar = mysqli_query($conexao, $query);
 
# Alunos curso
$query = "INSERT INTO ALUNOS_CURSOS(id_aluno, id_curso) VALUES(8, 1)";
mysqli_query($conexao, $query);
 
 
 
if(mysqli_query($conexao, "DELETE FROM ALUNOS WHERE ID_ALUNO = 9 or ID_ALUNO = 10")){
	echo 'Apagado com sucesso';
}
else{
	echo 'Falha ao apagar dados';
}
 
 
 
if(mysqli_query($conexao, "UPDATE ALUNOS SET NOME_ALUNO = 'Jose Miguel' WHERE ID_ALUNO = 7")){
	echo 'Sucesso';
}
 
if(mysqli_query($conexao, "UPDATE ALUNOS SET NOME_ALUNO = 'Maria Capitolina' WHERE ID_ALUNO = 8")){
	echo 'Sucesso';
}
 
 
 
echo '<table border=1>
		<tr>
			<th>id</th>
			<th>Nome</th>
			<th>Data de nascimento</th>
		</tr>';
 
$consulta = mysqli_query($conexao, "SELECT * FROM ALUNOS");
 
while($linha = mysqli_fetch_array($consulta)){
	echo '<tr><td>'.$linha['id_aluno'].'</td>';
	echo '<td>'.$linha['nome_aluno'].'</td>';
	echo '<td>'.$linha['data_nascimento'].'</td></tr>';
}
 
echo '</table>';
 
 
$consulta = mysqli_query($conexao, "SELECT ALUNOS.NOME_ALUNO, CURSOS.NOME_CURSO FROM ALUNOS, CURSOS, alunos_cursos where ALUNOS_CURSOS.ID_ALUNO = ALUNOS.ID_ALUNO AND ALUNOS_CURSOS = CURSOS.ID_CURSOS");
 
while($linha = mysqli_fetch_array($consulta)){
	echo '<tr><td>'.$linha['nome_curso'].'</td>';
	echo '<td>'.$linha['nome_aluno'].'</td>';
}
 
echo '</table>';
 
 
 
$consulta = mysqli_query($conexao, "SELECT ALUNOS.nome_aluno, CURSOS.nome_curso FROM ALUNOS, CURSOS, ALUNOS_CURSOS WHERE ALUNOS_CURSOS.id_aluno = ALUNOS.id_aluno AND ALUNOS_CURSOS.id_curso = CURSOS.id_curso");
 
echo '<table border=1><tr><th>Nome do aluno</th><th>Nome do curso</th></tr>';
while($linha = mysqli_fetch_array($consulta)){
	echo '<tr><td>'.$linha['nome_aluno'].'</td>';
	echo '<td>'.$linha['nome_curso'].'</td></tr>';
}
 
echo '</table>';