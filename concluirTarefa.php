<?php

session_start();

require 'tarefa.php';

$idTarefa = intval(filter_input(INPUT_POST, 'idTarefa', FILTER_SANITIZE_NUMBER_INT));

if ($idTarefa === 0 || !concluirTarefa($idTarefa)) {
    $_SESSION['mensagem'] = 'Ocorreu um erro ao concluir a tarefa.';
    header('Location: index.php');
    exit;
}

$_SESSION['mensagem'] = 'Tarefa concluída com sucesso.';
header('Location: index.php');
exit;
