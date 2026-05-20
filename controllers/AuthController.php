<?php
class AuthController
{
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

  public function logout()
  {
    session_destroy();
    header('Location: index.php?action=login');
  }
}
