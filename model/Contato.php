<?php

require('../dao/Conn.php');

class Contato {

	private $nome;
	private $email;
	private $telefone;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function novoContato($nome, $email, $telefone){
		try {
			$conexao = new Conn();
			$pdo = $conexao->conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			$sql = 'INSERT INTO contato (nome, email, telefone) VALUES (:nome, :email, :telefone)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
			if($stmt->execute()){
				return json_encode(true);
			}else{
				return json_encode(false);
			}
		} catch (PDOException $e) {
	        return $e->getMessage();
	    }
	}

	public function listarContatos($off){
		try {
			$conexao = new Conn();
			$pdo = $conexao->conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	        $lista = $pdo->query("SELECT * FROM contato LIMIT 6 OFFSET $off");

	        if ($lista) {
	            return $lista->fetchAll(PDO::FETCH_OBJ);
	        } else {
	            return false;
	        }
	    } catch (PDOException $e) {
	        return $e->getMessage();
	    }
	}

	public function listarContatosTotal(){
		try {
			$conexao = new Conn();
			$pdo = $conexao->conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	        $lista = $pdo->query("SELECT * FROM contato");
	        $dados = $lista->fetchAll(PDO::FETCH_OBJ);
	        $rows = count($dados);

	        if ($rows) {
	        	$totalPage = ceil($rows/6);
	            return $totalPage;
	        } else {
	            return false;
	        }
	    } catch (PDOException $e) {
	        return $e->getMessage();
	    }
	}

	public function deletarContato($id){
		try {
			$conexao = new Conn();
			$pdo = $conexao->conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	        $sql = 'DELETE FROM contato WHERE id = :id';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id', intval($id), PDO::PARAM_INT);

	        if($stmt->execute()){
				return json_encode(true);
			}else{
				return json_encode(false);
			}
	    } catch (PDOException $e) {
	        return $e->getMessage();
	    }
	}
	
	public function viewContato($id){
		try {
			$conexao = new Conn();
			$pdo = $conexao->conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	        $sql = 'SELECT * FROM contato WHERE id = :id';
			$stmt = $pdo->prepare($sql);
	        $stmt->bindParam(':id', intval($id), PDO::PARAM_INT);

	        if ($stmt->execute()) {
	            return $stmt->fetchAll(PDO::FETCH_OBJ);
	        } else {
	            return false;
	        }
	    } catch (PDOException $e) {
	        return $e->getMessage();
	    }
	}
}