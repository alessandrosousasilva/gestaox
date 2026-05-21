<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'config/Database.php';

spl_autoload_register(function ($class_name) {
  if (file_exists('controllers/' . $class_name . '.php')) {
    require_once 'controllers/' . $class_name . '.php';
  } elseif (file_exists('models/' . $class_name . '.php')) {
    require_once 'models/' . $class_name . '.php';
  }
});

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$authController = new AuthController();
$dashboardController = new DashboardController();
$vehicleController = new VehicleController();

switch ($action) {
  case 'login':
    $authController->login();
    break;
  case 'register':
    $authController->register();
    break;
  case 'logout':
    $authController->logout();
    break;
  case 'dashboard':
    $dashboardController->index();
    break;
  case 'task_add':
    $dashboardController->add();
    break;
  case 'vehicles':
    $vehicleController->index();
    break;
  case 'vehicle_add':
    $vehicleController->add();
    break;
  case 'vehicle_delete':
    $vehicleController->delete();
    break;
  default:
    $authController->login();
    break;
  case 'vehicle_edit':
    $vehicleController->edit();
    break;
  case 'task_edit':
    $dashboardController->edit();
    break;
  case 'task_delete':
    $dashboardController->delete();
    break;
  case 'task_toggle':
    $dashboardController->toggleStatus();
    break;
}
