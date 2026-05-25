<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Dashboard - Tarefas</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <header>
    <h1>📊 GestaoX</h1>

    <!-- Menu de navegação para acessar as diferentes seções do sistema -->
    <nav>
      <a href="index.php?action=dashboard" class="active">Tarefas</a>
      <a href="index.php?action=vehicles">Gestão de Veículos (CRUD)</a>
      <a href="index.php?action=logout" class="logout">Sair</a>
    </nav>
  </header>

  <!-- Conteúdo principal da página de dashboard, exibindo as tarefas do usuário -->
  <div class="content-wrapper">
    <div class="page-header-action">
      <h3>Suas Tarefas</h3>
      <a href="index.php?action=task_add" class="btn-add">+ Nova Tarefa</a>
    </div>

    <!-- Lista de tarefas do usuário, cada tarefa exibe título, status e ações para editar, excluir ou mudar status -->
    <ul class="task-list">
      <?php foreach ($tasks ?? [] as $t):
        $statusClass = ($t['status'] == 'Pendente') ? 'pending' : 'completed';
      ?>
        <li class="task-item <?php echo $statusClass; ?>">
          <div class="task-content">
            <span class="task-title"><?php echo htmlspecialchars($t['titulo']); ?></span>
            <span class="task-status-text"><?php echo $t['status']; ?></span>
          </div>

          <div class="task-actions">
            <a href="index.php?action=task_toggle&id=<?php echo $t['id']; ?>&status=<?php echo $t['status']; ?>" class="task-toggle" title="<?php echo $t['status'] == 'Pendente' ? 'Concluir' : 'Reabrir'; ?>">
              <?php echo $t['status'] == 'Pendente' ? '✔' : '↩'; ?>
            </a>

            <a href="index.php?action=task_edit&id=<?php echo $t['id']; ?>" class="task-edit" title="Editar">✏</a>

            <a href="index.php?action=task_delete&id=<?php echo $t['id']; ?>" onclick="return confirm('Deseja mesmo apagar essa tarefa?');" class="task-delete" title="Excluir">❌</a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>

</html>