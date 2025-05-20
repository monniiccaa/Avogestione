<?php

require_once 'conn.php';

class Users
{
    public static function getByUsername($username)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function register($username, $password, $role)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO users(username,password,ruolo) VALUES(:username,:password,:ruolo)");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $password_hash, PDO::PARAM_STR);
        $stmt->bindParam(":ruolo", $role, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public static function verifyPassword($username, $password)
    {
        global $conn;
        $user = self::getByUsername($username);
        return $user && password_verify($password, $user["password"]);
    }
}