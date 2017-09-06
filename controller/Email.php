<?php

require('../model/Email.php');

$classEmail = new Email();

$acao = $_POST['acao'];

$jsonArray = array();

switch ($acao) {
    case 'novo': {
            $idContato = ($_POST['id_contato']);
            $classEmail->setTipo($_POST['tipo']);
            $classEmail->setEmail($_POST['email']);
            echo json_encode($classEmail->novoEmail($idContato, $classEmail->getTipo(), $classEmail->getEmail()));
        }break;

    case 'listar': {
            $id = $_POST['id'];
            foreach ($classEmail->listarEmails($id) as $list) {
                $jsonArray['dados'][] = array(
                    'id' => $list->id,
                    'id_contato' => $list->id_contato,
                    'tipo' => $list->tipo,
                    'email' => $list->email
                );
            }
            echo json_encode($jsonArray);
        }break;

    case 'listar2': {
            //echo json_encode($classContato->listarContatosTotal());
        }break;

    case 'atualizar': {

        }break;

    case 'deletar': {
            $id = $_POST['id'];
            echo json_encode($classEmail->deletarEmail($id));
        }break;

    case 'view': {
            $id = $_POST['id'];
            foreach ($classEmail->viewEmails($id) as $listView) {
                $jsonArray['dados'][] = array(
                    'id' => $listView->id,
                    'nome' => $listView->nome,
                    'email' => $listView->email,
                    'telefone' => $listView->telefone
                );
            }
            echo json_encode($jsonArray);
        }break;
}