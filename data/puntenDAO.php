<?php
require_once('../entities/punten.php');
require_once('../data/dbconfig.php');

class PuntenDAO {
    public function getAll() {
        $sql = "SELECT * FROM punten";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $punt = new Punt((int)$rij['moduleID'], (int)$rij['persoonID'], (int)$rij['puntID']); // Aangepast naar 'puntID'
            array_push($lijst, $punt);
        }
        $dbh = null;
        return $lijst;
    }

    public function addPunt(int $moduleID, int $persoonID, int $punt) {
        $sql = "INSERT INTO punten (moduleID, persoonID, puntID) VALUES (:moduleID, :persoonID, :punt)"; // Aangepast naar 'puntID'
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':moduleID' => $moduleID, ':persoonID' => $persoonID, ':punt' => $punt)); // Aangepast naar 'punt'
        $dbh = null;
    }

    public function getPuntByID(int $moduleID, int $persoonID): ?Punt {
        $sql = "SELECT * FROM punten WHERE moduleID = :moduleID AND persoonID = :persoonID";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':moduleID' => $moduleID, ':persoonID' => $persoonID));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        if ($rij && isset($rij['puntID'])) { // Aangepast naar 'puntID'
            return new Punt((int)$rij['moduleID'], (int)$rij['persoonID'], (int)$rij['puntID']); // Aangepast naar 'puntID'
        }
        return null;
    }
}
?>