<?php 
try {
	$conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","");
	
} catch (\PDOException $e) {
	echo "erro ao conectar com o banco de dados ".$e->getCode();
}

include_once("alunos.php");

$alunos = new Alunos($conexao);
$id;
$nome;
$nota;
if (isset($_POST["editar"])) {

	$alunos->setId($_POST["id"])
			->setNome($_POST["nome"])
			->setNota($_POST["nota"]);
	$altera = $alunos->alterar();
	if ($altera) {
		header("location: index.php");
	}

}else{
	$alterar = $alunos->find($_GET["id"]);

	for ($i=0; $i <count($alterar); $i++) { 
		$id = $alterar["id"];
		$nome = $alterar["nome"];
		$nota = $alterar["nota"];
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

	<form action="editar.php" method="post">

		<h2>Editar Aluno</h2>
	
		<label for="nome">Nome</label>
		<input type="text" name="nome" value="<?php echo $nome ?>">
		
		<label for="nota">Nome</label>
		<input type="text" name="nota" value="<?php echo $nota ?>">

		<input type="hidden" name="id" value="<?php echo $id ?>">

		<input type="submit" name="editar" value="editar">

		<p><a href="index.php">Voltar</a></p>

	</form>
</body>
</html>