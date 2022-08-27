<?php

require 'tarefa.php';
require 'funcoes.php';

$idTarefa = intval(filter_input(INPUT_POST, 'idTarefa', FILTER_SANITIZE_NUMBER_INT));

if ($idTarefa === 0 || !excluirTarefa($idTarefa)) {
    enviarMensagem('danger', 'Ocorreu um erro ao excluir a tarefa.');
}

enviarMensagem('success', 'Tarefa excluída com sucesso.');
