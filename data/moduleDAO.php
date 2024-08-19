<?php
require_once('../entities/Module.php');
require_once('../data/DBConfig.php');

class ModuleDAO {
    public function getAll() {
        $sql = "SELECT * FROM modules";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $module = new Module((int)$rij['id'], (string)$rij['naam']);
            array_push($lijst, $module);
        }
        $dbh = null;
        return $lijst;
    }
}
?>
