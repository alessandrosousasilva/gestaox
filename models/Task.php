<?php

// Modelo para gerenciamento de tarefas
class Task
{

  // Propriedade para armazenar a conexão com o banco de dados
  private $db;
  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  // Obtém todas as tarefas de um usuário específico
  public function getAllByUser($user_id)
  {
    $stmt = $this->db->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Adiciona uma nova tarefa para um usuário específico
  public function add($user_id, $titulo)
  {
    $stmt = $this->db->prepare("INSERT INTO tasks (user_id, titulo) VALUES (?, ?)");
    return $stmt->execute([$user_id, $titulo]);
  }

  // Marca uma tarefa como concluída
  public function complete($id)
  {
    $stmt = $this->db->prepare("UPDATE tasks SET status = 'Concluida' WHERE id = ?");
    return $stmt->execute([$id]);
  }

  // Marca uma tarefa como pendente
  public function getById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Atualiza o título de uma tarefa existente
  public function update($id, $titulo)
  {
    $stmt = $this->db->prepare("UPDATE tasks SET titulo = ? WHERE id = ?");
    return $stmt->execute([$titulo, $id]);
  }

  // Exclui uma tarefa
  public function delete($id)
  {
    $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
    return $stmt->execute([$id]);
  }

  // Alterna o status de uma tarefa entre Pendente e Concluída
  public function updateStatus($id, $status)
  {
    $stmt = $this->db->prepare("UPDATE tasks SET status = ? WHERE id = ?");
    return $stmt->execute([$status, $id]);
  }
}
