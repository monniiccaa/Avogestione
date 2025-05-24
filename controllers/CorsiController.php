<?php


class CorsiController
{
    public static function showAll(): void
    {
        $corsi = Corsi::getAll();
        require 'views/ViewCorsi.php';
    }

    public static function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titolo = $_POST['titolo'];
            $descrizione = $_POST['descrizione'];
            $maxPartecipanti = $_POST['max'];
            $dataEOra = $_POST['date'];
            $aula = $_POST['aula'];


            if (Corsi::create($titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula)) {
                header('Location:index.php');
                exit();
            } else {
                echo 'Errore nella creazione del corso.';
            }
        }


        require 'views/FormCorsi.php';
    }

    public static function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titolo = $_POST['titolo'];
            $corso = Corsi::getByTitle($titolo);

            $descrizione = $_POST['descrizione'];
            $maxPartecipanti = $_POST['max'];
            $dataEOra = $_POST['date'];
            $aula = $_POST['aula'];

            if (Corsi::update($corso->getId(), $titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula)) {
                header('Location:index.php');
                exit();
            } else {
                echo 'Errore nella modifica del corso.';
            }

        }


        require 'views/FormCorsi.php';
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