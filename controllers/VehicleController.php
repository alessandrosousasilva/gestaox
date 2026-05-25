<?php

// Controlador para gerenciamento de veículos
class VehicleController
{

  // Exibe a lista de veículos
  public function index()
  {
    if (!isset($_SESSION['user_id'])) header('Location: index.php?action=login');
    $vehicleModel = new Vehicle();
    $vehicles = $vehicleModel->getAll();
    require 'views/vehicles.php';
  }

  // Processa a adição de um novo veículo
  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $vehicleModel = new Vehicle();
      $vehicleModel->add($_POST['placa'], $_POST['modelo'], $_POST['tipo']);
    }
    header('Location: index.php?action=vehicles');
  }

  // Processa a exclusão de um veículo
  public function delete()
  {
    if (isset($_GET['id'])) {
      $vehicleModel = new Vehicle();
      $vehicleModel->delete($_GET['id']);
    }
    header('Location: index.php?action=vehicles');
  }

  // Exibe o formulário para editar um veículo existente e processa a edição
  public function edit()
  {
    if (!isset($_SESSION['user_id'])) header('Location: index.php?action=login');
    $vehicleModel = new Vehicle();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $vehicleModel->update($_POST['id'], $_POST['placa'], $_POST['modelo'], $_POST['tipo']);
      header('Location: index.php?action=vehicles');
      exit;
    }

    $vehicle = $vehicleModel->getById($_GET['id']);
    require 'views/vehicle_edit.php';
  }
}
