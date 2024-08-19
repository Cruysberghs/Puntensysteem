<?php
require_once('../data/PersoonDAO.php');

class PersoonService {
    private $persoonDAO;

    public function __construct() {
        $this->persoonDAO = new PersoonDAO();
    }

    public function getPersonen() {
        return $this->persoonDAO->getAll();
    }
}
?>
