<?php

require('../model/Contato.php');

$classContato = new Contato();

$acao = $_POST['acao'];

$jsonArray = array();

switch ($acao) {
	case 'novo':{
		$classContato->setNome($_POST['nome']);
		$classContato->setEmail($_POST['email']);
		$classContato->setTelefone($_POST['telefone']);
		echo json_encode($classContato->novoContato($classContato->getNome(), $classContato->getEmail(), $classContato->getTelefone()));
	}break;
	
	case 'listar':{
		$off = $_POST['off'];
		foreach($classContato->listarContatos($off) as $list){
			$jsonArray['dados'][] = array(
                'id' 				=> $list->id,
                'nome' 				=> $list->nome,
                'email' 			=> $list->email,
                'telefone' 			=> $list->telefone
            );
		}
		echo json_encode($jsonArray);
	}break;

	case 'listar2':{
		echo json_encode($classContato->listarContatosTotal());
	}break;

	case 'atualizar':{}break;

	case 'deletar':{
		$id = $_POST['id'];
		echo json_encode($classContato->deletarContato($id));
	}break;

	case 'view':{
		$id = $_POST['id'];
		foreach($classContato->viewContato($id) as $listView){
			$jsonArray['dados'][] = array(
                'id' 				=> $listView->id,
                'nome' 				=> $listView->nome,
                'email' 			=> $listView->email,
                'telefone' 			=> $listView->telefone
            );
		}
		echo json_encode($jsonArray);
	}break;
}