<?php

require('../model/Telefone.php');
require('../helper/Telefone.php');

$classTelefone = new Telefone();
$classHelpder = new TelefoneHelper();

$acao = $_POST['acao'];

$jsonArray = array();

switch ($acao) {
    case 'novo': {
            $idContato = ($_POST['id_contato']);
            $classTelefone->setTipo($_POST['tipo']);
            $classTelefone->setTelefone(preg_replace("/[^0-9]/", "", $_POST['telefone']));
            echo json_encode($classTelefone->novoTelefone($idContato, $classTelefone->getTipo(), $classTelefone->getTelefone()));
        }break;

    case 'listar': {
            $id = $_POST['id'];
            foreach ($classTelefone->listarTelefones($id) as $list) {
                $jsonArray['dados'][] = array(
                    'id' => $list->id,
                    'id_contato' => $list->id_contato,
                    'tipo' => $list->tipo,
                    'fone' => $classHelpder->masc_tel($list->fone)
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
            echo json_encode($classTelefone->deletarTelefone($id));
        }break;

    case 'view': {
            $id = $_POST['id'];
            foreach ($classContato->viewTelefones($id) as $listView) {
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