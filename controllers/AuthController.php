<?php

require_once 'enums/Roles.php';
require_once 'models/Users.php';

class AuthController
{

    public static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (Users::verifyPassword($username, $password)) {
                $user = Users::getByUsername($username);

                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['ruolo'] = $user['ruolo'];
                header('Location: index.php?action=home');
            }

            echo "<p> Username o password errata </p>";
        }

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

            Users::register($username, $password, $ruolo);
            header("Location: index.php?action=login");
        }

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

