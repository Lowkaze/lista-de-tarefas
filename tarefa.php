<?php

declare(strict_types=1);

function getMysqli(): mysqli | bool
{
    return mysqli_connect('localhost', 'root', '', 'lista_de_tarefas');
}

function adicionarTarefa(string $tarefa): bool
{
    $mysqli = getMysqli();

    if (!$mysqli) {
        return false;
    }

    $stmt = mysqli_prepare($mysqli, 'INSERT INTO tarefas (descricao) VALUES (?)');
    mysqli_stmt_bind_param($stmt, 's', $tarefa);

    return mysqli_stmt_execute($stmt);
}

function excluirTarefa(int $idTarefa): bool
{
    $mysqli = getMysqli();

    if (!$mysqli) {
        return false;
    }

    $stmt = mysqli_prepare($mysqli, 'DELETE FROM tarefas WHERE id = ?');

    if (!$stmt) {
        return false;
    }

    if (!mysqli_stmt_bind_param($stmt, 'i', $idTarefa)) {
        return false;
    }

    return mysqli_stmt_execute($stmt);
}

function buscarTarefas(): array | bool
{
    $mysqli = getMysqli();

    if (!$mysqli) {
        return false;
    }

    $stmt = mysqli_query($mysqli, 'SELECT * FROM tarefas ORDER BY status ASC');

    if (!$stmt) {
        return false;
    }

    return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
}

function concluirTarefa(int $idTarefa): bool
{
    $mysqli = getMysqli();

    if (!$mysqli) {
        return false;
    }

    $stmt = mysqli_prepare($mysqli, 'UPDATE tarefas SET status = 1 WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $idTarefa);

    return mysqli_stmt_execute($stmt);
}
