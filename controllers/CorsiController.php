<?php


require_once 'models/Corsi.php';

class CorsiController
{
    public static function showAll(): void
    {
        $corsi = Corsi::getAll();
        if (empty($corsi)) {
            echo "Nessuno corso trovato";
            exit();
        }
        require 'views/ViewCorsi.php';
    }

    public static function getCorsiOfUserJson(): void
    {
        header("Content-type: application/json");
        $corsi = Corsi::getCorsiOfUser($_SESSION["id"]);
        echo json_encode($corsi);
    }


    public static function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titolo = $_POST['titolo'];
            $descrizione = $_POST['descrizione'];
            $maxPartecipanti = $_POST['max'];
            $dataEOra = $_POST['date'];
            $aula = $_POST['aula'];
            $idOrganizzatore = $_SESSION['id'];


            if (Corsi::create($titolo, $descrizione, $maxPartecipanti, $dataEOra, $idOrganizzatore, $aula)) {
                header('Location:index.php');
                exit();
            } else {
                echo "<script>alert('Errore creazione corso dal corso.')</script>";
            }
        }

        $action = "create";
        require 'views/creaCorso.php';
    }


    public static function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $titolo = $_POST['titolo'];
            $descrizione = $_POST['descrizione'];
            $maxPartecipanti = $_POST['max'];
            $dataEOra = $_POST['date'];
            $aula = $_POST['aula'];

            if (Corsi::update($id, $titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula)) {
                header('Location:index.php?action=corsi');
            } else {
                echo "<script>alert('Errore creazione corso dal corso.')</script>";
            }

        }


        $corsi = Corsi::getCorsiOfUser($_SESSION['id']);
        if (empty($corsi)) {
            echo "<p>Non hai nessun corso da modificare. Crea uno <a href='/index.php?action=create'>qui!</a></p>";
            exit();
        }
        $action = "update";
        require_once 'views/creaCorso.php';
    }

    public static function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            if (Corsi::delete($id)) {
                header('Location:index.php?action=corsi');
                exit();
            } else {
                echo "Errore nell'eliminazione del corso";
            }
        }

        $corsi = Corsi::getCorsiOfUser($_SESSION['id']);
        if (empty($corsi)) {
            echo "<p>Non hai nessun corso da Eliminare. Crea uno <a href='/index.php?action=create'>qui!</a></p>";

            exit();
        }
        require_once 'views/DeleteCorsi.php';

    }
}

