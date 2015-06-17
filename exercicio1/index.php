<?php 
#Crie um sistema para listar todos os alunos e também para listar os que têm as três maiores notas.
$lista;
try {
	$conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","");

	$sql = "select * from alunos order by nota";
	$stmt = $conexao->query($sql);

	$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

	
} catch (\PDOException $e) {
	echo "erro ao conectar com o banco de dados ".$e->getCode();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PDO</title>
	<style>
		#nota{
			position:absolute;
			left: 10%;
			top: 20%;
			width: 80%;
		}
	</style>
</head>
<body>

	<div id="principal">
		<table border=1 width=40% cellspacing=0 >
			<tr>
				<td align="center"><b>ID</b></td>
				<td align="center"><b>NOME</b></td>
				<td align="center"><b>NOTA</b></td>
			</tr>
			<?php for ($i=0; $i < count($lista) ; $i++) { ?>
			<tr >
				<td><?php echo $lista[$i]["id"] ?></td>
				<td><?php echo $lista[$i]["nome"] ?></td>
				<td><?php echo $lista[$i]["nota"] ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>

	<div id="nota" align="right">
		<table border=1 width=40% cellspacing=0 >
			<th colspan="2">Melhores notas:</th>
			<tr>
				<td align="center"><b>Nome</b></td>
				<td align="center"><b>Nota</b></td>
			</tr>
			<?php for ($i=17; $i < count($lista) ; $i++) { ?>
			<tr >
				<td><?php echo $lista[$i]["nome"] ?></td>
				<td><?php echo $lista[$i]["nota"] ?></td>
			</tr>
			<?php } ?>

		</table>
	</div>



	
</body>
</html>