<?php


// TODO: Fare Il User Model
// require_once 'Models/UserModel.php'

class AuthController
{
    static function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];


        }
    }
}