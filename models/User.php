<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  public function register($nome, $email, $senha)
  {
    $hash = password_hash($senha, PASSWORD_BCRYPT);
    $stmt = $this->db->prepare("INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)");
    return $stmt->execute([$nome, $email, $hash]);
  }

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
