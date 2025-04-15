<?php
    require_once 'models/Corsi.php';
    require_once 'controllers/AuthController.php';

    class CorsiController {
        public static function showAll () {
            $corsi = Corsi::getAll();
            require 'views/CorsiView.php';
        }

        public static function create () {

        }

        public static function update () {

        }

        public static function delete () {
            
        }
    }
?>