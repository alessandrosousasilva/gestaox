<!DOCTYPE html>
<?php
if (!isset($task)) {
  $task = ['id' => '', 'titulo' => ''];
}
?>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Tarefa</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <header>
    <h1>📊 GestaoX</h1>
    <nav>
      <a href="index.php?action=dashboard" class="active">Tarefas</a>
      <a href="index.php?action=vehicles">Gestão de Veículos (CRUD)</a>
      <a href="index.php?action=logout" class="logout">Sair</a>
    </nav>
  </header>

  <div class="content-wrapper">
    <div class="auth-card" style="margin-top: 40px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
      <h2 style="margin-bottom: 25px; color: var(--primary-color);">Editar Tarefa</h2>
      <form method="POST" action="index.php?action=task_edit">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">

        <div class="form-group">
          <label>Título da Tarefa:</label>
          <input type="text" name="titulo" value="<?php echo htmlspecialchars($task['titulo']); ?>" required autofocus>
        </div>

        <button type="submit" class="auth-btn">Atualizar Tarefa</button>
      </form>
      <div class="auth-links">
        <a href="index.php?action=dashboard">← Cancelar e Voltar</a>
      </div>
    </div>
  </div>
</body>

</html>