<?php

require_once 'Roles.php';


class AuthController
{

    /* TODO: Completare Quando I model e i view sono aggiornati */
    public static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ruolo = $_POST['ruolo'];

            // TODO: CHECK PASSWORD
            $_SESSION['id'] = /* TODO: mettere ID vero */
                69;
            $_SESSION['username'] = $username;
            $_SESSION['ruolo'] = $ruolo;

            header('Location: index.php?action=home');
        }

        /* TODO: MOSTRARE IL FORM DEL LOGIN */
        require_once 'views/login.php';
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }

    public static function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ruolo = $_POST['ruolo'];
            // TODO: Salvare su DB

            header("Location: index.php?action=login");
        }

        /* TODO: mostrare il form del login */
        require_once 'views/registrazione.php';
    }

    public static function HasRole(Roles $ruolo)
    {
        AuthController::requireLogin();
        if ($ruolo != Roles::from($_SESSION['ruolo'])) {
            echo '<p>Accesso Negato </p>';
            exit();
        }
    }

    public static function requireLogin()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: index.php?action=login');
        }

    }
}

