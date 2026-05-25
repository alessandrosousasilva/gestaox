<?php

// Controlador para autenticação de usuários
class AuthController
{

  // Exibe o formulário de login e processa o login
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $userModel = new User();
      $user = $userModel->login($_POST['email'], $_POST['senha']);
      if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nome'] = $user['nome'];
        header('Location: index.php?action=dashboard');
        exit;
      } else {
        $erro = "E-mail ou senha incorretos!";
      }
    }
    require 'views/login.php';
  }

  // Exibe o formulário de registro e processa o registro
  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $userModel = new User();
      $userModel->register($_POST['nome'], $_POST['email'], $_POST['senha']);
      header('Location: index.php?action=login');
      exit;
    }
    require 'views/register.php';
  }

  // Processa o logout do usuário
  public function logout()
  {
    session_destroy();
    header('Location: index.php?action=login');
  }
}
