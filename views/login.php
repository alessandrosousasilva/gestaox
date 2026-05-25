<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Gestaox - Login</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>

  <!-- Página de login do sistema, onde os usuários podem inserir suas credenciais para acessar o dashboard -->
  <div class="auth-wrapper">
    <div class="auth-card">
      <div class="auth-logo">
        <span style="font-size: 2.2rem;">📊</span> GestaoX
      </div>
      <div class="auth-subtitle">Login no Sistema</div>

      <!-- Exibe mensagem de erro caso as credenciais sejam inválidas -->
      <?php if (isset($erro)) echo "<div class='error-msg'>$erro</div>"; ?>

      <form method="POST" action="index.php?action=login">
        <div class="form-group">
          <label>E-mail:</label>
          <input type="email" name="email" placeholder="user@email.com" required autofocus>
        </div>

        <div class="form-group">
          <label>Senha:</label>
          <input type="password" name="senha" placeholder="••••••••" required>
        </div>

        <button type="submit" class="auth-btn">Entrar</button>
      </form>

      <div class="auth-links">
        Ainda não tem conta? <a href="index.php?action=register">Cadastre-se</a>
      </div>
    </div>
  </div>
</body>

</html>