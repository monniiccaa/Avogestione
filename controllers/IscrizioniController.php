<?php

require_once 'models/iscrizioni.php';
require_once "controllers/CorsiController.php";

class IscrizioniController
{
    public static function showAllUserSubscriptions(): void
    {
        $iscrizioni = Iscrizioni::getAllUserSubscriptions($_SESSION['id']);
        if (empty($iscrizioni)) {
            echo "<script>alert('Non sei iscritto a nessun corso')</script>";
            exit();
        }
        require 'views/ViewIscrizione.php';
    }

    public static function subscribe(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idCorso = $_POST['id'];
            $idUser = $_SESSION['id'];

            if (Iscrizioni::isFull($idUser, $idCorso)) {
                echo '<script>alert("Il corso a cui stai cercando di iscriverti è pieno o ti sei già iscritto");window.location.replace("/index.php?action=corsi");</script>';
                exit();
            } else {
                echo 'Iscrizione avvenuta con successo';
            }
        }

        self::showAllUserSubscriptions();
    }

    public static function unsubscribe(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $user = $_SESSION['id'];
            if (Iscrizioni::deleteIscrizione($user, $id)) {
                $action = "unsubscribe";
                require 'views/ViewIscrizione.php';
                exit();
            } else {
                echo "<script>alert('Errore cancellare la iscrizione dal corso.')</script>";
            }
        }

    }
}