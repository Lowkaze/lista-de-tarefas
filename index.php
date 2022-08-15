<?php $tarefas = require 'buscarTarefas.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Lista de tarefas</title>
</head>

<body>
    <div class="container-fluid vh-100 bg-dark text-white d-flex flex-column pt-3 pb-3 gap-3 align-items-center overflow-auto">
        <?php if (isset($_SESSION['mensagem'])) : ?>
            <div class="w-50 alert alert-success alert-dismissible fade show m-0" role="alert">
                <?= $_SESSION['mensagem']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['mensagem']);  ?>
        <?php endif; ?>
        <div class="d-flex w-100 align-items-center justify-content-center">
            <form action="adicionarTarefa.php" method="post">
                <div class="d-flex gap-3">
                    <input class="form-control form-control-lg" maxlength="255" type="text" name="tarefa" id="tarefa" placeholder="Sua tarefa" required>
                    <button class="btn btn-primary btn-lg">Adicionar</button>
                </div>
            </form>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center gap-3">
            <?php if (!empty($tarefas)) : ?>
                <?php foreach ($tarefas as $tarefa) : ?>
                    <div class="d-flex w-100 gap-3 align-items-center justify-content-center">
                        <span class="fs-4 text-nowrap <?= (int) $tarefa['status'] === 1 ? 'text-decoration-line-through' : ''; ?>"><?= $tarefa['descricao']; ?></span>
                        <?php if ((int) $tarefa['status'] === 0) : ?>
                            <form action="concluirTarefa.php" method="post">
                                <button name="idTarefa" class="btn btn-success btn-lg" value="<?= $tarefa['id']; ?>">Concluir</button>
                            </form>
                        <?php endif; ?>
                        <form action="excluirTarefa.php" method="post">
                            <button name="idTarefa" class="btn btn-danger btn-lg" value="<?= $tarefa['id']; ?>">Excluir</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
