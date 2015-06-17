<?php 
try {
	$conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","");
	
} catch (\PDOException $e) {
	echo "erro ao conectar com o banco de dados ".$e->getCode();
}
include_once("alunos.php");
$alunos = new Alunos($conexao);
$exclui = $alunos->excluir($_GET["id"]);

if ($exclui) {
	header("location: index.php");
}
 ?>
