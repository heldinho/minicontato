<?php

require('../dao/Conn.php');

class Email {
	
	private $tipo;
	private $email;

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function novoEmail($id_contato, $tipo, $email){
		try {
			$conexao = new Conn();
			$pdo = $conexao->conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			$sql = 'INSERT INTO emails (id_contato, tipo, email) VALUES (:id_contato, :tipo, :email)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id_contato', $id_contato, PDO::PARAM_STR);
			$stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			if($stmt->execute()){
				return json_encode(true);
			}else{
				return json_encode(false);
			}
		} catch (PDOException $e) {
	        return $e->getMessage();
	    }
	}

	public function listarEmails($id){
		try {
			$conexao = new Conn();
			$pdo = $conexao->conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	        $lista = $pdo->query("SELECT * FROM emails WHERE id_contato = $id");

	        if ($lista) {
	            return $lista->fetchAll(PDO::FETCH_OBJ);
	        } else {
	            return false;
	        }
	    } catch (PDOException $e) {
	        return $e->getMessage();
	    }
	}

	public function deletarEmail($id){
		try {
			$conexao = new Conn();
			$pdo = $conexao->conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	        $sql = 'DELETE FROM emails WHERE id = :id';
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

	public function viewEmails($id){
		try {
			$conexao = new Conn();
			$pdo = $conexao->conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	        $sql = 'SELECT * FROM emails WHERE id_contato = :id';
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