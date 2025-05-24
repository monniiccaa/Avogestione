<?php
$dsn = "mysql:host=localhost;dbname=avogestione;charset=utf8";
$user = "AvoGestione";
$password = "AvoGestione";
try {
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Errore di connessione: " . $e->getMessage());
}
