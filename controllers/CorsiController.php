<?php


    class CorsiController {
        public static function showAll () {
            $corsi = Corsi::getAll();
            require 'views/CorsiView.php';
        }

        public static function create () {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $titolo = $_POST['titolo'];
                $descrizione = $_POST['descrizione'];
                
                $corso = new Corsi ($titolo, $descrizione);

                if ($corso->save()) {
                    header('Location:index.php');
                    exit();
                } else {
                    echo 'Errore nella creazione del corso.';
                }
            }
            require 'views/corsi_form.php';
        }

        public static function update ($cod) {
            $corso = Corsi::getById($cod);

            if (!$corso) {
                die ('Libro non trovato.');
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $titolo = $_POST['titolo'];
                $descrizione = $_POST['descrizione'];
                
                $corso->setTitolo($titolo);
                $corso->setDescrizione($descrizione);

                if ($corso->save()) {
                    header('Location:index.php');
                    exit();
                } else {
                    echo 'Errore nella modifica del corso.';
                }
            }
            require 'views/corsi_form.php';
        }

        public static function delete ($cod) {
            $corso = Corsi::getById($cod);
            
            if ($corso && $corso->delete()) {
                header('Location:index.php');
                exit();
            } else {
                echo "Errore nell'eliminazione del corso";
            }
        }
    }
?>