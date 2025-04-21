<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/CorsiController.php';
require_once 'controllers/IscrizioniController.php';

session_start();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'login':
        AuthController::login();
        break;
    case 'logout':
        AuthController::logout();
        break;
    case 'register':
        AuthController::register();
        break;
    default:
        AuthController::requireLogin();


}