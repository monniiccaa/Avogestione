<?php

require_once 'conn.php';
class Corsi
{
    private $idOrganizzatore;

    public function __construct()
    {
        $this->idOrganizzatore = $_SESSION['id'];
    }

    public static function create($titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO corsi (titolo,descrizione,dataEOra,maxPartecipanti,idOrganizzatore,aula) VALUES (:Titolo,:Descrizione,:DataEOra,:maxPartecipanti,:IdOrganizzatore,:Aula)");
        $stmt->bindParam(":Titolo", $titolo, PDO::PARAM_STR);
        $stmt->bindParam(":Descrizione", $descrizione, PDO::PARAM_STR);
        $stmt->bindParam(":DataEOra", $dataEOra, PDO::PARAM_STR);
        $stmt->bindParam(":maxPartecipanti", $maxPartecipanti, PDO::PARAM_STR);
        $stmt->bindParam(":IdOrganizzatore", $_SESSION["id"], PDO::PARAM_INT);
        $stmt->bindParam(":Aula", $aula, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public static function getAll()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM corsi ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByTitle($titolo)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM corsi WHERE titolo=:titolo");
        $stmt->bindParam(":titolo", $titolo, PDO::PARAM_STR);
        $stmt->execute();
        if ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $result['id'];
        } else {
            return false;
        }
    }
    public static function delete($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM corsi WHERE id=:id");
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function update($cod, $titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula)
    {
        global $conn;
        $stmt = $conn->prepare("UPDATE corsi SET titolo=:titolo,descrizione=:descrizione,maxPartecipanti=:maxPartecipanti,dataEOra=:dataEOra,aula=:aula WHERE cod=:cod");
        $stmt->bindParam(":cod", $cod, PDO::PARAM_STR);
        $stmt->bindParam(":titolo", $titolo, PDO::PARAM_STR);
        $stmt->bindParam(":descrizione", $descrizione, PDO::PARAM_STR);
        $stmt->bindParam(":maxPartecipanti", $maxPartecipanti, PDO::PARAM_INT);
        $stmt->bindParam(":dataEOra", $dataEOra, PDO::PARAM_STR);
        $stmt->bindParam(":aula", $aula, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getIdOrganizzatore()
    {
        return $this->idOrganizzatore;
    }
}
