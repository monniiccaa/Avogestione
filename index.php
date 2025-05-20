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

    case 'create':
        AuthController::HasRole(Roles::ORGANIZZATORE);
        CorsiController::create();
        break;

    case 'delete':
        AuthController::HasRole(Roles::ORGANIZZATORE);
        CorsiController::delete($_GET['cod']);
        break;


    case 'logout':
        AuthController::logout();
        break;
    case 'register':
        AuthController::register();
        break;
    default:
        require_once 'views/homePage.html';
        break;


}