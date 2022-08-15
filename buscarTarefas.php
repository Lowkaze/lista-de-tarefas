<?php

session_start();

require 'tarefa.php';

$tarefas = buscarTarefas();

return $tarefas;
