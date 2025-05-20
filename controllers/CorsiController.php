<?php


    class CorsiController {
        public static function showAll () {
            $corsi = Corsi::getAll();
            require 'views/CorsiView.php';
        }

        public static function create () {
            $titolo = $_GET['titolo'];
            $descrizione = $_GET['descrizione'];
            $maxPartecipanti = $_GET['max'];
            $dataEOra = $_GET['date'];
            $aula = $_GET['aula'];

            if (Corsi::create($titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula)) {
                header('Location:index.php');
                exit();
            } else {
                echo 'Errore nella creazione del corso.';
            }
            
            require 'views/corsi_form.php';
        }

        public static function update ($title) {
            $cod = Corsi::getByTitle($title);

            if (!$cod) {
                die ('Libro non trovato.');
            }

            $titolo = $_GET['titolo'];
            $descrizione = $_GET['descrizione'];
            $maxPartecipanti = $_GET['max'];
            $dataEOra = $_GET['date'];
            $aula = $_GET['aula'];           
            
            if (Corsi::update($cod, $titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula)) {
                header('Location:index.php');
                exit();
            } else {
                echo 'Errore nella modifica del corso.';
            }
            
            require 'views/corsi_form.php';
        }

        public static function delete ($title) {
            $cod = Corsi::getByTitle($title);
            
            if ($cod && Corsi::delete($cod)) {
                header('Location:index.php');
                exit();
            } else {
                echo "Errore nell'eliminazione del corso";
            }
        }
    }
?>