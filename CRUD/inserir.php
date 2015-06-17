<?php 
try {
	$conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","");
	
} catch (\PDOException $e) {
	echo "erro ao conectar com o banco de dados ".$e->getCode();
}

include_once("alunos.php");
$alunos = new Alunos($conexao);
if (isset($_POST["gravar"])) {

	$alunos->setNome($_POST["nome"])
			->setNota($_POST["nota"]);
	$inserir = $alunos->inserir();
	if ($inserir) {
		header("location: index.php");
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>editar</title>
	<style>
		form{
			position:absolute;
			left: 10%;
			top: 20%;
			width: 80%;
		}
	</style>
	
</head>
<body>

	<form action="inserir.php" method="post">

		<h2>Novo Aluno</h2>
	
		<label for="nome">Nome</label>
		<input type="text" name="nome" >
		
		<label for="nota">Nota</label>
		<input type="text" name="nota">

		<input type="submit" name="gravar" value="gravar">
		<p><a href="index.php">Voltar</a></p>
	</form>
</body>
</html>