<?php

// Modelo para gerenciamento de usuários
class User
{

  // Propriedade para armazenar a conexão com o banco de dados
  private $db;

  // O construtor inicializa a conexão com o banco de dados
  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  // Registra um novo usuário no sistema
  public function register($nome, $email, $senha)
  {
    $hash = password_hash($senha, PASSWORD_BCRYPT);
    $stmt = $this->db->prepare("INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)");
    return $stmt->execute([$nome, $email, $hash]);
  }

  // Verifica as credenciais do usuário para login
  public function login($email, $senha)
  {
    $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
      return $user;
    }
    return false;
  }
}
