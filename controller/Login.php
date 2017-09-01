<?php

include('./contato/model/Login.php');

$classLogin = new Login();

$acao = $_POST['acao'];

$classLogin->setEmail((isset($_POST['email'])) ? $_POST['email'] : '');
$classLogin->setSenha((isset($_POST['senha'])) ? $_POST['senha'] : '');
$classLogin->setLembrete((isset($_POST['lembrete'])) ? $_POST['lembrete'] : '');
$jsonArray = array();

switch ($acao) {
	case 'login':{
		echo json_encode($classLogin->AcessoLogin($classLogin->getEmail(), $classLogin->getSenha(), $classLogin->getLembrete()));
	}break;
	
	case 'logout':{}break;

	case 'cookie':{
		$jsonArray['dados'][] = array(
                'email' 	=> (isset($_COOKIE['CookieEmail'])) ? base64_decode($_COOKIE['CookieEmail']) : '',
                'senha' 	=> (isset($_COOKIE['CookieSenha'])) ? base64_decode($_COOKIE['CookieSenha']) : '',
                'lembrete'	=> (isset($_COOKIE['CookieLembrete'])) ? base64_decode($_COOKIE['CookieLembrete']) : ''
            );
		echo json_encode($jsonArray);
	}break;
}