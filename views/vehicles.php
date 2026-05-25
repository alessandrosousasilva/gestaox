<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Gestão de Frota</title>
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

  <!-- Conteúdo principal da página de gestão de veículos, exibindo a lista de veículos cadastrados e um formulário para adicionar novos veículos -->
  <div class="content-wrapper">
    <div class="page-header-action">
      <h3>Veículos Cadastrados</h3>
    </div>

    <!-- Formulário para adicionar um novo veículo, onde o usuário pode inserir placa, modelo e tipo do veículo e salvar -->
    <div class="add-form-container" style="margin-bottom: 30px;">
      <form method="POST" action="index.php?action=vehicle_add" style="display: flex; gap: 15px; width: 100%; max-width: 900px; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.03); align-items: flex-end;">

        <div class="form-group" style="flex: 1; margin-bottom: 0;">
          <label>Placa:</label>
          <input type="text" name="placa" placeholder="ABC-1234" required>
        </div>

        <div class="form-group" style="flex: 2; margin-bottom: 0;">
          <label>Modelo:</label>
          <input type="text" name="modelo" placeholder="Ex: Fiat Fiorino" required>
        </div>

        <div class="form-group" style="flex: 1.5; margin-bottom: 0;">
          <label>Tipo:</label>
          <select name="tipo">
            <option value="Frota Propria">Frota Própria</option>
            <option value="Terceirizada">Terceirizada</option>
          </select>
        </div>

        <button type="submit" class="auth-btn" style="width: auto; margin-top: 0; padding: 12px 25px;">+ Adicionar</button>
      </form>
    </div>

    <!-- Tabela que exibe os veículos cadastrados, com colunas para ID, placa, modelo, tipo e ações para editar ou excluir cada veículo -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Tipo</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($vehicles) && !empty($vehicles)): ?>
            <?php foreach ($vehicles as $v):
              $typeClass = '';
              if ($v['tipo'] == 'Frota Propria') $typeClass = 'propria';
              elseif ($v['tipo'] == 'Terceirizada') $typeClass = 'terceirizada';
              else $typeClass = 'entrega';
            ?>
              <tr>
                <td><?php echo $v['id']; ?></td>
                <td><?php echo htmlspecialchars($v['placa']); ?></td>
                <td><?php echo htmlspecialchars($v['modelo']); ?></td>
                <td class="vehicle-type <?php echo $typeClass; ?>"><?php echo $v['tipo']; ?></td>
                <td class="table-actions">
                  <a href="index.php?action=vehicle_edit&id=<?php echo $v['id']; ?>" class="table-edit">Editar</a>
                  <a href="index.php?action=vehicle_delete&id=<?php echo $v['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir o veículo <?php echo $v['placa']; ?>?');" class="table-delete">Excluir</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" style="text-align: center; padding: 20px;">Nenhum veículo cadastrado</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>