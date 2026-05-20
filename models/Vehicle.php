<?php
class Vehicle
{
  private $db;
  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  public function getAll()
  {
    return $this->db->query("SELECT * FROM vehicles")->fetchAll(PDO::FETCH_ASSOC);
  }

  public function add($placa, $modelo, $tipo)
  {
    $stmt = $this->db->prepare("INSERT INTO vehicles (placa, modelo, tipo) VALUES (?, ?, ?)");
    return $stmt->execute([$placa, $modelo, $tipo]);
  }

  public function delete($id)
  {
    $stmt = $this->db->prepare("DELETE FROM vehicles WHERE id = ?");
    return $stmt->execute([$id]);
  }

  public function getById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM vehicles WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($id, $placa, $modelo, $tipo)
  {
    $stmt = $this->db->prepare("UPDATE vehicles SET placa=?, modelo=?, tipo=? WHERE id=?");
    return $stmt->execute([$placa, $modelo, $tipo, $id]);
  }
}
