<?php

namespace model;

use dao\Conn;

class Login {

    private $email;
    private $senha;
    private $lembrete;

    function __construct() {
        $conexao = new Conn();
        $pdo = $conexao->conectar();
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getEmail() {
        return $this->email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function getSenha() {
        return $this->senha;
    }

    function setLembrete($lembrete) {
        $this->lembrete = $lembrete;
    }

    function getLembrete() {
        return $this->lembrete;
    }

    function AcessoLogin($email, $senha, $lembrete) {

        if (!empty($email) && !empty($senha)) {
            $sql = 'SELECT id, nome, email FROM login WHERE email = ? AND senha = ?';
            $stm = $pdo->prepare($sql);
            $stm->bindValue(1, $email);
            $stm->bindValue(2, $email);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);

            if (!empty($dados)) {

                $_SESSION['id'] = $dados->id;
                $_SESSION['nome'] = $dados->nome;
                $_SESSION['email'] = $dados->email;
                $_SESSION['logado'] = TRUE;

                if ($this->getLembrete() == 'SIM') {

                    $expira = time() + 60 * 60 * 24 * 30;
                    setCookie('CookieLembrete', base64_encode('SIM'), $expira);
                    setCookie('CookieEmail', base64_encode($email), $expira);
                    setCookie('CookieSenha', base64_encode($senha), $expira);
                } else {

                    setCookie('CookieLembrete');
                    setCookie('CookieEmail');
                    setCookie('CookieSenha');
                }

                return json_encode(1);
                //return "<script>window.location = '../home.html'</script>";
            } else {

                $_SESSION['logado'] = FALSE;
                return json_encode(0);
                //return "<script>window.location = '../index.php'</script>";
            }
        }
    }

}
