<?php
session_start(); // Inicia a sessão para gerenciamento de autenticação e dados do usuário
ini_set('display_errors', 1); // Configura o PHP para exibir erros, útil para desenvolvimento e depuração
error_reporting(E_ALL); // Configura o PHP para reportar todos os tipos de erros

// Inclui a classe de conexão com o banco de dados e configura o autoload para carregar automaticamente os controladores e modelos necessários
require_once 'config/Database.php';

// Função de autoload para carregar automaticamente as classes dos controladores e modelos quando forem instanciadas
spl_autoload_register(function ($class_name) {
  if (file_exists('controllers/' . $class_name . '.php')) {
    require_once 'controllers/' . $class_name . '.php';
  } elseif (file_exists('models/' . $class_name . '.php')) {
    require_once 'models/' . $class_name . '.php';
  }
});

// Determina a ação a ser executada com base no parâmetro 'action' na URL, ou define como 'login' por padrão
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Instancia os controladores necessários para lidar com as ações de autenticação, dashboard e gerenciamento de veículos
$authController = new AuthController();
$dashboardController = new DashboardController();
$vehicleController = new VehicleController();

// Roteamento simples para direcionar as requisições para os métodos apropriados dos controladores com base na ação solicitada
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
