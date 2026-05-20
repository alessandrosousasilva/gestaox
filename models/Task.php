<?php
class Task
{
  private $db;
  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  public function getAllByUser($user_id)
  {
    $stmt = $this->db->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function add($user_id, $titulo)
  {
    $stmt = $this->db->prepare("INSERT INTO tasks (user_id, titulo) VALUES (?, ?)");
    return $stmt->execute([$user_id, $titulo]);
  }

  public function complete($id)
  {
    $stmt = $this->db->prepare("UPDATE tasks SET status = 'Concluida' WHERE id = ?");
    return $stmt->execute([$id]);
  }

  public function getById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($id, $titulo)
  {
    $stmt = $this->db->prepare("UPDATE tasks SET titulo = ? WHERE id = ?");
    return $stmt->execute([$titulo, $id]);
  }

  public function delete($id)
  {
    $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
    return $stmt->execute([$id]);
  }

  public function updateStatus($id, $status)
  {
    $stmt = $this->db->prepare("UPDATE tasks SET status = ? WHERE id = ?");
    return $stmt->execute([$status, $id]);
  }
}
