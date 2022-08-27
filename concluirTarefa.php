<?php

require 'tarefa.php';
require 'funcoes.php';

$idTarefa = intval(filter_input(INPUT_POST, 'idTarefa', FILTER_SANITIZE_NUMBER_INT));

if ($idTarefa === 0 || !concluirTarefa($idTarefa)) {
    enviarMensagem('danger', 'Ocorreu um erro ao concluir a tarefa.');
}

enviarMensagem('success', 'Tarefa concluída com sucesso.');
