<?php

// Modelo para gerenciamento de veículos
class Vehicle
{

  // Propriedade para armazenar a conexão com o banco de dados
  private $db;

  // O construtor inicializa a conexão com o banco de dados
  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  // Obtém todos os veículos cadastrados no sistema
  public function getAll()
  {
    return $this->db->query("SELECT * FROM vehicles")->fetchAll(PDO::FETCH_ASSOC);
  }

  // Adiciona um novo veículo ao sistema
  public function add($placa, $modelo, $tipo)
  {
    $stmt = $this->db->prepare("INSERT INTO vehicles (placa, modelo, tipo) VALUES (?, ?, ?)");
    return $stmt->execute([$placa, $modelo, $tipo]);
  }

  // Exclui um veículo do sistema
  public function delete($id)
  {
    $stmt = $this->db->prepare("DELETE FROM vehicles WHERE id = ?");
    return $stmt->execute([$id]);
  }
  // Obtém os detalhes de um veículo específico pelo ID
  public function getById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM vehicles WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Atualiza as informações de um veículo existente
  public function update($id, $placa, $modelo, $tipo)
  {
    $stmt = $this->db->prepare("UPDATE vehicles SET placa=?, modelo=?, tipo=? WHERE id=?");
    return $stmt->execute([$placa, $modelo, $tipo, $id]);
  }
}
