<?php 
class alunos{

	private $db;

	private $id;
	private $nome;
	private $nota;

	public function setId($id){ 
		$this->id = $id;
		return $this;
	}
	public function setNome($nome){
		$this->nome = $nome;
		return $this;
	}
	public function setNota($nota){
		$this->nota = $nota;
		return $this;
	}

	public function getId(){ return $this->id;}
	public function getNome(){ return $this->nome;}
	public function getNota(){ return $this->nota;}

	public function __construct($db){
		$this->db = $db;
	}

	public function find($id){
		$sql = "select * from alunos where id =:id";

		$stmt = $this->db->prepare($sql);
		$stmt->bindvalue(":id",$id);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function listar($query = null){

		if ($query == null) {
			$sql = "select * from alunos";
			$stmt = $this->db->query($sql);

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}else{

			$sql = "select * from alunos where nome like '%$query%'";
			$stmt = $this->db->query($sql);

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}	
	}

	public function inserir(){
		$sql = "insert into alunos (nome,nota) values (:nome, :nota)";

		$stmt = $this->db->prepare($sql);
		$stmt->bindvalue(":nome",$this->getNome());
		$stmt->bindvalue(":nota",$this->getNota());

		if ($stmt->execute()) {
			return true;
		}
	}

	public function alterar(){

		$sql = "UPDATE alunos set nome=:nome, nota=:nota where id=:id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":nome", $this->getNome());
		$stmt->bindValue(":nota", $this->getNota());
		$stmt->bindValue(":id", $this->getId());

		if ($stmt->execute()) {
			return true;
		}
	}
	public function excluir($id){

		$sql = "delete from alunos where id =:id";

		$stmt = $this->db->prepare($sql);
		$stmt->bindvalue(":id",$id);
		

		if ($stmt->execute()) {
			return true;
		}
	}

}

?>