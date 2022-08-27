<?php

declare(strict_types=1);

session_start();

function enviarMensagem(string $tipoMensagem, string $mensagem): void
{
    $_SESSION['tipoMensagem'] = $tipoMensagem;
    $_SESSION['mensagem'] = $mensagem;
    header('Location: index.php');
    exit;
}
