<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Gestaox - Cadastro</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>

  <!-- Página de registro do sistema, onde os novos usuários podem criar uma conta para acessar o dashboard -->
  <div class="auth-wrapper">
    <div class="auth-card">
      <div class="auth-logo">
        <span style="font-size: 2.2rem;">📊</span> GestaoX
      </div>
      <div class="auth-subtitle">Cadastro de Usuário</div>

      <!-- Formulário de registro, onde os usuários inserem nome, e-mail e senha para criar uma nova conta -->
      <form method="POST" action="index.php?action=register">
        <div class="form-group">
          <label>Nome:</label>
          <input type="text" name="nome" placeholder="Nome Completo" required autofocus>
        </div>

        <div class="form-group">
          <label>E-mail:</label>
          <input type="email" name="email" placeholder="Seu melhor e-mail" required>
        </div>

        <div class="form-group">
          <label>Senha:</label>
          <input type="password" name="senha" placeholder="Crie uma senha segura" required>
        </div>

        <button type="submit" class="auth-btn">Criar Conta</button>
      </form>

      <div class="auth-links">
        Já tem conta? <a href="index.php?action=login">Voltar ao Login</a>
      </div>
    </div>
  </div>
</body>

</html>