<?php

require_once 'models/iscrizioni.php';

class IscrizioniController
{
    public static function showAllUserSubscriptions(): void
    {
        $iscrizioni = Iscrizioni::getAllUserSubscriptions();
        if (empty($iscrizioni)) {
            echo "Non sei iscritto a nessun corso";
            exit();
        }
        require 'views/ViewIscrizione.php';
    }
    
    public static function subscribe(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idCorso = $_POST['id'];


            if (Iscrizioni::!isFull()) {
                echo '<script>alert("Il corso a cui stai cercando di iscriverti è pieno.")</script>';
            } else {
                echo 'Iscrizione avvenuta con successo';
            }
        }

        $action = "subscribe";
        require 'views/ViewIscrizione.php';
    }

    public static function unsubscribe(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            if (Iscrizioni::deleteIscrizione($id)) {
                $action = "unsubscribe";
                require 'views/ViewIscrizione.php';
                exit();
            } else {
                echo "Errore nella disicrizione dal corso.";
            }
        }

    }
}