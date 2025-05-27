<?php

require_once 'conn.php';
require_once 'models/Corsi.php';

class Iscrizioni
{


    private static function addIscrizione($idUser, $idCorso): bool
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO iscrizioni (userId,corsoId) VALUES (:userId,:corsoId)");
        $stmt->bindParam(":corsoId", $idCorso, PDO::PARAM_INT);
        $stmt->bindParam(":userId", $idUser, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function deleteIscrizione($idUser, $idCorso): bool
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM iscrizioni WHERE corsoId=:corsoId AND userId=:userId");
        $stmt->bindParam("corsoId", $idCorso, PDO::PARAM_INT);
        $stmt->bindParam("userId", $idUser, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function getPostiDisponibili($idCorso): int
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM iscrizioni WHERE corsoId=:corsoId");
        $stmt->bindParam(":corsoId", $idCorso, PDO::PARAM_INT);
        $stmt->execute();
        $postiPresi = $stmt->rowCount();
        $corso = Corsi::getById($idCorso);
        $postiMax = $corso->getMaxPartecipanti();

        return $postiMax - $postiPresi;
    }

    public static function isFull($idUser, $idCorso): bool
    {
        global $conn;
        $findIscrizioni = $conn->prepare("SELECT COUNT(*) As nIscrizioni FROM iscrizioni WHERE corsoId=:corsoId");
        $findIscrizioni->bindParam(":corsoId", $idCorso, PDO::PARAM_INT);
        $findIscrizioni->execute();
        $nIscrizioni = $findIscrizioni->fetch(PDO::FETCH_ASSOC);
        $findMaxPartecipanti = $conn->prepare("SELECT maxPartecipanti FROM corsi WHERE id=:id");
        $findMaxPartecipanti->bindParam(":id", $idCorso, PDO::PARAM_INT);
        $findMaxPartecipanti->execute();
        $maxPartecipanti = $findMaxPartecipanti->fetch(PDO::FETCH_ASSOC);
        if ($nIscrizioni["nIscrizioni"] < $maxPartecipanti["maxPartecipanti"]) {
            return self::addIscrizione($idUser, $idCorso);
        }
        return false;
    }

    public static function getAllUserSubscriptions($id): array
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM iscrizioni JOIN corsi ON iscrizioni.corsoId=corsi.id WHERE iscrizioni.userId=:userId");
        $stmt->bindParam(":userId", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $subscriptions = [];
        foreach ($result as $row) {
            $subscriptions[] = new Corsi($row["id"], $row["titolo"], $row["descrizione"], $row["dataEORA"], $row["maxPartecipanti"], $row["idOrganizzatore"], $row["aula"]);
        }
        return $subscriptions;
    }
}
