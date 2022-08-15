<?php

session_start();

require 'tarefa.php';

$tarefa = htmlspecialchars($_POST['tarefa']);

if (!adicionarTarefa($tarefa)) {
    $_SESSION['mensagem'] = 'Ocorreu um erro ao adicionar uma nova tarefa.';
    header('Location: index.php');
    exit;
}

$_SESSION['mensagem'] = 'Tarefa adicionada com sucesso.';
header('Location: index.php');
exit;
