<?php


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
        }

        /* TODO: MOSTRARE IL FORM DEL LOGIN */
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
    }

    public static function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ruolo = $_POST['ruolo'];
            // TODO: Salvare su DB
        }

        /* TODO: mostrare il form del login */
    }

    public static function requireLogin()
    {
        if (!isset($_SESSION['id'])) {
            header('location: index.php?action=login');
        }

    }
}

