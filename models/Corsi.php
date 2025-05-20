<?php

require_once 'conn.php';
class Corsi
{
    private $id;
    private $titolo;
    private $descrizione;
    private $maxPartecipanti;
    private $dataEOra;
    private $aula;
    private $idOrganizzatore;

    // quanto sono bravo a usare visual studio

    public function __construct($id, $titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula, $idOrganizzatore)
    {
        $this->id = $id;
        $this->titolo = $titolo;
        $this->descrizione = $descrizione;
        $this->maxPartecipanti = $maxPartecipanti;
        $this->dataEOra = $dataEOra;
        $this->aula = $aula;
        $this->idOrganizzatore = $idOrganizzatore;
    }

    public static function create($titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO corsi (titolo,descrizione,dataEOra,maxPartecipanti,idOrganizzatore,aula) VALUES (:Titolo,:Descrizione,:DataEOra,:maxPartecipanti,:IdOrganizzatore,:Aula)");
        $stmt->bindParam(":Titolo", $titolo, PDO::PARAM_STR);
        $stmt->bindParam(":Descrizione", $descrizione, PDO::PARAM_STR);
        $stmt->bindParam(":DataEOra", $dataEOra, PDO::PARAM_STR);
        $stmt->bindParam(":maxPartecipanti", $maxPartecipanti, PDO::PARAM_STR);
        $stmt->bindParam(":IdOrganizzatore", $_SESSION["user_id"], PDO::PARAM_INT);
        $stmt->bindParam(":Aula", $aula, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public static function getAll()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM corsi ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $corsi = [];
        foreach ($result as $row) {
            $corsi[] = new Corsi($row["id"], $row["titolo"], $row["descrizione"], $row["maxPartecipanti"], $row["dataEOra"], $row["aula"], $row["idOrganizzatore"]);
        }
        return $corsi;
    }

    public static function getByTitle($titolo)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM corsi WHERE titolo=:titolo");
        $stmt->bindParam(":titolo", $titolo, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Corsi($result["id"], $result["titolo"], $result["descrizione"], $result["maxPartecipanti"], $result["dataEOra"], $result["aula"], $result["idOrganizzatore"]);
    }
    public static function delete($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM corsi WHERE id=:id");
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function update($id, $titolo, $descrizione, $maxPartecipanti, $dataEOra, $aula)
    {
        global $conn;
        $stmt = $conn->prepare("UPDATE corsi SET titolo=:titolo,descrizione=:descrizione,maxPartecipanti=:maxPartecipanti,dataEOra=:dataEOra,aula=:aula WHERE id=:id");
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->bindParam("titolo", $titolo, PDO::PARAM_STR);
        $stmt->bindParam("descrizione", $descrizione, PDO::PARAM_STR);
        $stmt->bindParam(":maxPartecipanti", $maxPartecipanti, PDO::PARAM_INT);
        $stmt->bindParam(":dataEOra", $dataEOra, PDO::PARAM_STR);
        $stmt->bindParam(":aula", $aula, PDO::PARAM_STR);
        return $stmt->execute();
    }


    public static function getAllUserSubscriptions()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM iscrizioni JOIN corsi ON iscrizioni.corsoId=corsi.id WHERE iscrizioni.userId=:userId");
        $stmt->bindParam(":userId", $_SESSION["user_id"], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $subscriptions = [];
        foreach ($result as $row) {
            $subscriptions = new Corsi($row["id"], $row["titolo"], $row["descrizione"], $row["maxPartecipanti"], $row["dataEOra"], $row["aula"], $row["idOrganizzatore"]);
        }
        return $subscriptions;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitolo()
    {
        return $this->titolo;
    }
    public function getDescrizione()
    {
        return $this->descrizione;
    }
    public function getMaxPartecipanti()
    {
        return $this->maxPartecipanti;
    }
    public function getDataEOra()
    {
        return $this->dataEOra;
    }
    public function getAula()
    {
        return $this->aula;
    }
    public function getIdOrganizzatore()
    {
        return $this->idOrganizzatore;
    }
}
