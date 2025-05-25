<?php


require_once 'models/Corsi.php';

class CorsiController
{
    public static function showAll(): void
    {
        $corsi = Corsi::getAll();
        require 'views/ViewCorsi.php';
    }

    public static function getCorsiOfUserJson()
    {
        header("Content-type: application/json");
        $corsi = Corsi::getCorsiOfUser($_SESSION["id"]);
        echo json_encode($corsi, JSON_THROW_ON_ERROR);
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
                echo 'Errore nella creazione del corso.';
            }
        }

        $action = "create";
        require 'views/FormCorsi.php';
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
                echo 'Errore nella modifica del corso.';
            }

        }


        $corsi = Corsi::getCorsiOfUser($_SESSION['id']);
        $action = "update";
        require_once 'views/FormCorsi.php';
    }

    public static function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $corso = Corsi::getByTitle($title);

            if (Corsi::delete($corso->getId())) {
                header('Location:index.php');
                exit();
            } else {
                echo "Errore nell'eliminazione del corso";
            }
        }

    }
}

?>