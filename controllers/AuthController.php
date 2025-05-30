<?php

require_once 'enums/Roles.php';
require_once 'models/Users.php';

class AuthController
{

    public static function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = Users::getByUsername($username);


            if ($user !== null && password_verify($password, $user->getPassword())) {
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['ruolo'] = $user->getRuolo();
                header('Location: index.php?action=home');
            }

            echo "<script> alert('Username o password errata') </script>";
        }

        require_once 'views/login.php';
    }

    public static function logout(): void
    {
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
    }

    public static function register(): void
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

    public static function HasRole(Roles $ruolo): void
    {
        AuthController::requireLogin();
        if ($ruolo != Roles::from($_SESSION['ruolo'])) {
            echo '<script>alert("Devi avere il ruolo di Organizzatore")</script>';
            header('Location: index.php?action=corsi');
        }
    }

    public static function requireLogin(): void
    {
        if (!isset($_SESSION['id'])) {
            echo '<script> alert("Devi prima fare il login.")</script>';
            header('Location: index.php?action=login');
        }

    }
}

