<?php

require_once 'conn.php';

class Corsi implements JsonSerializable
{

    private int $id;
    private string $titolo;
    private string $descrizione;
    private string $dataEOra;
    private int $maxPartecipanti;
    private int $idOrganizzatore;
    private string $aula;


    public function __construct($id, $titolo, $descrizione, $dataEOra, $maxPartecipanti, $idOrganizzatore, $aula)
    {
        $this->id = $id;
        $this->titolo = $titolo;
        $this->descrizione = $descrizione;
        $this->dataEOra = $dataEOra;
        $this->maxPartecipanti = $maxPartecipanti;
        $this->idOrganizzatore = $idOrganizzatore;
        $this->aula = $aula;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitolo(): string
    {
        return $this->titolo;
    }

    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    public function getDataEOra(): string
    {
        return $this->dataEOra;
    }

    public function getMaxPartecipanti(): int
    {
        return $this->maxPartecipanti;
    }

    public function getAula(): string
    {
        return $this->aula;
    }

    public function getIdOrganizzatore()
    {
        return $this->idOrganizzatore;
    }


    public static function create($titolo, $descrizione, $maxPartecipanti, $dataEOra, $idOrganizzatore, $aula): bool
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO corsi (titolo,descrizione,dataEOra,maxPartecipanti,idOrganizzatore,aula) VALUES (:Titolo,:Descrizione,:DataEOra,:maxPartecipanti,:IdOrganizzatore,:Aula)");
        $stmt->bindParam(":Titolo", $titolo);
        $stmt->bindParam(":Descrizione", $descrizione);
        $stmt->bindParam(":DataEOra", $dataEOra);
        $stmt->bindParam(":maxPartecipanti", $maxPartecipanti);
        $stmt->bindParam(":IdOrganizzatore", $idOrganizzatore, PDO::PARAM_INT);
        $stmt->bindParam(":Aula", $aula);
        return $stmt->execute();
    }


    public static function getAll(): array
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM corsi ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $corsi = array();
        foreach ($result as $row) {
            $corsi[] = new Corsi($row["id"], $row["titolo"], $row["descrizione"], $row["dataEORA"], $row["maxPartecipanti"], $row["idOrganizzatore"], $row["aula"]);
        }
        return $corsi;
    }

    public static function getByTitle($titolo): Corsi
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM corsi WHERE titolo=:titolo");
        $stmt->bindParam(":titolo", $titolo, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Corsi($result["id"], $result["titolo"], $result["descrizione"], $result["dataEOra"], $result["maxPartecipanti"], $result["idOrganizzatore"], $result["aula"]);
    }

    public static function getCorsiOfUser(int $idUser): array
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM corsi WHERE idOrganizzatore=:idUser");
        $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $corsi = array();
        foreach ($result as $row) {
            $corsi[] = new Corsi($row["id"], $row["titolo"], $row["descrizione"], $row["dataEORA"], $row["maxPartecipanti"], $row["idOrganizzatore"], $row["aula"]);
        }
        return $corsi;
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
        $stmt = $conn->prepare("UPDATE corsi SET titolo=:titolo,descrizione=:descrizione,maxPartecipanti=:maxPartecipanti,dataEOra=:dataEOra,aula=:aula WHERE id=:cod");
        $stmt->bindParam(":cod", $cod, PDO::PARAM_STR);
        $stmt->bindParam(":titolo", $titolo, PDO::PARAM_STR);
        $stmt->bindParam(":descrizione", $descrizione, PDO::PARAM_STR);
        $stmt->bindParam(":maxPartecipanti", $maxPartecipanti, PDO::PARAM_INT);
        $stmt->bindParam(":dataEOra", $dataEOra, PDO::PARAM_STR);
        $stmt->bindParam(":aula", $aula, PDO::PARAM_STR);
        return $stmt->execute();
    }


    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            'dataEOra' => $this->dataEOra,
            'maxPartecipanti' => $this->maxPartecipanti,
            'idOrganizzatore' => $this->idOrganizzatore,
            'aula' => $this->aula
        ];
    }
}
