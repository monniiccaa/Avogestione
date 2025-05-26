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

    case 'corsi':
//        AuthController::requireLogin();
        CorsiController::showAll();
        break;

    case 'getCorsiOfUserJson':
        AuthController::HasRole(Roles::ORGANIZZATORE);
        CorsiController::getCorsiOfUserJson();
        break;

    case 'update':
        AuthController::HasRole(Roles::ORGANIZZATORE);
        CorsiController::update();
        break;

    case 'create':
        AuthController::HasRole(Roles::ORGANIZZATORE);
        CorsiController::create();
        break;

    case 'delete':
        AuthController::HasRole(Roles::ORGANIZZATORE);
        CorsiController::delete();
        break;
    case 'subscribe':
        AuthController::requireLogin();
        IscrizioniController::subscribe();
        break;
    case 'iscrizioni':
        AuthController::requireLogin();
        IscrizioniController::showAllUserSubscriptions();
        break;unsubscribe
    case 'unsubscribe':
        AuthController::requireLogin();
        IscrizioniController::unsubscribe();
        break;
    case 'logout':
        AuthController::logout();
        break;
    case 'register':
        AuthController::register();
        break;
    default:
        require_once 'views/homePage.php';
        break;


}