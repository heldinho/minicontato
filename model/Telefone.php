<?php

require('../dao/Conn.php');

class Telefone {

    private $tipo;
    private $telefone;

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function novoTelefone($id_contato, $tipo, $fone) {
        try {
            $conexao = new Conn();
            $pdo = $conexao->conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $sql = 'INSERT INTO telefones (id_contato, tipo, fone) VALUES (:id_contato, :tipo, :fone)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_contato', $id_contato, PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
            $stmt->bindParam(':fone', $fone, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return json_encode(true);
            } else {
                return json_encode(false);
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function listarTelefones($id) {
        try {
            $conexao = new Conn();
            $pdo = $conexao->conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $lista = $pdo->query("SELECT * FROM telefones WHERE id_contato = $id");

            if ($lista) {
                return $lista->fetchAll(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deletarTelefone($id) {
        try {
            $conexao = new Conn();
            $pdo = $conexao->conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $sql = 'DELETE FROM telefones WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', intval($id), PDO::PARAM_INT);

            if ($stmt->execute()) {
                return json_encode(true);
            } else {
                return json_encode(false);
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function viewTelefones($id) {
        try {
            $conexao = new Conn();
            $pdo = $conexao->conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $sql = 'SELECT * FROM telefones WHERE id_contato = :id';
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
