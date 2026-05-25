<?php
class Database // Conexão com o banco de dados
{
  // Implementação do padrão Singleton para garantir uma única conexão
  private static $instance = null;
  private $conn;

  // O construtor é privado para evitar instâncias diretas
  private function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=localhost;dbname=sistema_frota_mvc", "root", "");
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Erro na conexão: " . $e->getMessage());
    }
  }

  // Método estático para obter a instância da conexão
  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new Database();
    }
    return self::$instance->conn;
  }
}
