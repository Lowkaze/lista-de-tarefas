<?php

require 'tarefa.php';
require 'funcoes.php';

$tarefa = htmlspecialchars($_POST['tarefa']);

if (!adicionarTarefa($tarefa)) {
    enviarMensagem('danger', 'Ocorreu um erro ao adicionar uma nova tarefa.');
}

enviarMensagem('success', 'Tarefa adicionada com sucesso.');
