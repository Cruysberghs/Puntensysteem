<?php
require_once('../data/PuntenDAO.php');

class PuntenService {
    private $puntenDAO;

    public function __construct() {
        $this->puntenDAO = new PuntenDAO();
    }

    public function getPunten() {
        return $this->puntenDAO->getAll();
    }

    public function addPunt(int $moduleID, int $persoonID, int $punt) {
        $existingPunt = $this->puntenDAO->getPuntByID($moduleID, $persoonID);
        if ($existingPunt === null) {
            $this->puntenDAO->addPunt($moduleID, $persoonID, $punt);
        } else {
            throw new Exception("Punt voor deze module-persoon combinatie bestaat al.");
        }
    }

    public function getPuntByID(int $moduleID, int $persoonID): ?Punt {
        return $this->puntenDAO->getPuntByID($moduleID, $persoonID);
    }
}