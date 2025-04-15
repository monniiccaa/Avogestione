<?php
    require_once 'controller/AuthController.php';
    require_once 'controller/CorsiController.php';
    require_once 'controller/IscrizioniController.php';

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
            
    }
?>