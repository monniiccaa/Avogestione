<?php


class AuthController
{
    /* TODO: Completare Quando I model e i view sono aggiornati */
    public static function login()
    {
    }

    public static function logout()
    {
    }

    public static function register()
    {
    }

    public static function requireLogin()
    {
        if (!isset($_SESSION['id'])) {
            header('location: index.php?action=login');
        }

    }
}

