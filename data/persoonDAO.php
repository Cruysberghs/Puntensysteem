<?php
require_once('../entities/Persoon.php');
require_once('../data/DBConfig.php');

class PersoonDAO {
    public function getAll() {
        $sql = "SELECT * FROM personen";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $persoon = new Persoon((int)$rij['id'], (string)$rij['familienaam'], (string)$rij['voornaam'], (string)$rij['geboortedatum'], (string)$rij['geslacht']);
            array_push($lijst, $persoon);
        }
        $dbh = null;
        return $lijst;
    }
}
?>
