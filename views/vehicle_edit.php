<?php
$vehicle = $vehicle ?? [
  'id' => '',
  'placa' => '',
  'modelo' => '',
  'tipo' => ''
];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Veículo</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <header>
    <h1>📊 GestaoX</h1>

    <!-- Menu de navegação para acessar as diferentes seções do sistema -->
    <nav>
      <a href="index.php?action=dashboard">Tarefas</a>
      <a href="index.php?action=vehicles" class="active">Gestão de Veículos (CRUD)</a>
      <a href="index.php?action=logout" class="logout">Sair</a>
    </nav>
  </header>

  <!-- Conteúdo principal da página de edição de veículo, onde o usuário pode atualizar as informações do veículo existente -->
  <div class="content-wrapper">
    <div class="auth-card" style="margin-top: 40px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
      <h2 style="margin-bottom: 25px; color: var(--primary-color);">Editar Veículo</h2>
      <form method="POST" action="index.php?action=vehicle_edit">
        <input type="hidden" name="id" value="<?php echo $vehicle['id']; ?>">

        <div class="form-group">
          <label>Placa:</label>
          <input type="text" name="placa" value="<?php echo htmlspecialchars($vehicle['placa']); ?>" required autofocus>
        </div>

        <div class="form-group">
          <label>Modelo:</label>
          <input type="text" name="modelo" value="<?php echo htmlspecialchars($vehicle['modelo']); ?>" required>
        </div>

        <div class="form-group">
          <label>Tipo de Frota:</label>
          <select name="tipo">
            <option value="Frota Propria" <?php if ($vehicle['tipo'] == 'Frota Propria') echo 'selected'; ?>>Frota Própria</option>
            <option value="Terceirizada" <?php if ($vehicle['tipo'] == 'Terceirizada') echo 'selected'; ?>>Terceirizada</option>
            <option value="Entrega Direta" <?php if ($vehicle['tipo'] == 'Entrega Direta') echo 'selected'; ?>>Entrega Direta</option>
          </select>
        </div>

        <button type="submit" class="auth-btn">Salvar Alterações</button>
      </form>
      <div class="auth-links">
        <a href="index.php?action=vehicles">← Cancelar e Voltar</a>
      </div>
    </div>
  </div>
</body>

</html>