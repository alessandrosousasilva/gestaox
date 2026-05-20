<?php
class DashboardController
{
  public function index()
  {
    if (!isset($_SESSION['user_id'])) header('Location: index.php?action=login');

    $taskModel = new Task();
    $tasks = $taskModel->getAllByUser($_SESSION['user_id']);
    require 'views/dashboard.php';
  }

  public function add()
  {
    if (!isset($_SESSION['user_id'])) header('Location: index.php?action=login');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $taskModel = new Task();
      $taskModel->add($_SESSION['user_id'], $_POST['titulo']);
      header('Location: index.php?action=dashboard');
      exit;
    }
    require 'views/task_add.php';
  }

  public function edit()
  {
    if (!isset($_SESSION['user_id'])) header('Location: index.php?action=login');
    $taskModel = new Task();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $taskModel->update($_POST['id'], $_POST['titulo']);
      header('Location: index.php?action=dashboard');
      exit;
    }

    $task = $taskModel->getById($_GET['id']);
    require 'views/task_edit.php';
  }

  public function delete()
  {
    if (!isset($_SESSION['user_id'])) header('Location: index.php?action=login');
    if (isset($_GET['id'])) {
      $taskModel = new Task();
      $taskModel->delete($_GET['id']);
    }
    header('Location: index.php?action=dashboard');
    exit;
  }

  public function toggleStatus()
  {
    if (!isset($_SESSION['user_id'])) header('Location: index.php?action=login');
    if (isset($_GET['id']) && isset($_GET['status'])) {
      $taskModel = new Task();
      // Se estiver pendente, vira concluída. Se estiver concluída, volta para pendente.
      $newStatus = ($_GET['status'] == 'Pendente') ? 'Concluida' : 'Pendente';
      $taskModel->updateStatus($_GET['id'], $newStatus);
    }
    header('Location: index.php?action=dashboard');
    exit;
  }
}
