<?php

require_once 'conn.php';

class Users
{
    private int $id;
    private string $username;
    private string $password;
    private string $ruolo;

    public function __construct(int $id, string $username, string $password, string $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->ruolo = $role;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRuolo(): string
    {
        return $this->ruolo;
    }


    public static function getByUsername($username): Users
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Users($result["id"], $result['username'], $result['password'], $result['ruolo']);
    }

    public static function getById($id): Users
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Users($result["id"], $result['username'], $result['password'], $result['ruolo']);
    }

    public static function register($username, $password, $role): void
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO users(username,password,ruolo) VALUES(:username,:password,:ruolo)");
        $stmt->bindParam(":username", $username);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $password_hash);
        $stmt->bindParam(":ruolo", $role);
        $stmt->execute();
    }
}