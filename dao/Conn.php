<?php

class Conn {
	
	private $host 		= 'localhost';
	private $usuario 	= 'root';
	private $senha 		= '';
	private $db 		= 'minicontato';

	public function conectar() {
		$dns = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
		try{
			$conn = new PDO($dns, $this->usuario, $this->senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (PDOException $erro) {
			return $erro->getMessage();
		}
	}

}