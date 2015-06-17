<?php 
try {
	$conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","");
	
} catch (\PDOException $e) {
	echo "erro ao conectar com o banco de dados ".$e->getCode();
}
include_once("alunos.php");
$alunos = new Alunos($conexao);


if (isset($_POST["pesquisar"])) {
	$lista=$alunos->listar($_POST["nome"]);
	#header("location:index.php");
}else{
	$lista=$alunos->listar();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PDO</title>
	<style>
		#principal{
			position:absolute;
			left: 10%;
			top: 20%;
			width: 80%;
		}
		form{
			position:absolute;
			left: 10%;
			top: 10%;
			width: 80%;
		}
	</style>
</head>
<body>
	

	<form action="index.php" method="post">
		
		<label for="nome">Nome</label>
		<input type="text" name="nome">

		<input type="submit" name="pesquisar" value="pesquisar">

		<p><a href="inserir.php">Inserir novo aluno</a></p>
	</form>
	

	<div id="principal">
		<table border=1 width=40% cellspacing=0 >
			<tr>
				<td align="center"><b>NOME</b></td>
				<td align="center"><b>NOTA</b></td>
				<td align="center"><b>AÇÃO</b></td>
			</tr>
			<?php 
				foreach ($lista as $aluno) {
					echo"<tr>";
					echo"<td>".$aluno["nome"]."</td>";
					echo"<td>".$aluno["nota"]."</td>";
				    echo'<td><a href="editar.php?id=' . $aluno["id"] . '">Alterar </a>| <a href="excluir.php?id=' . $aluno["id"] . '">Excluir</a></td>';
					echo"</tr>";

				} 

			?>
			
		
		</table>
	</div>

</body>
</html>