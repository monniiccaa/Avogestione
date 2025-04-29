<?php
    require_once 'models/Corsi.php';
    require_once 'controllers/AuthController.php';

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

        public static function update () {

        }

        public static function delete () {
            
        }
    }
?>