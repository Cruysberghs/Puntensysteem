<?php
require_once('../data/ModuleDAO.php');

class ModuleService {
    private $moduleDAO;

    public function __construct() {
        $this->moduleDAO = new ModuleDAO();
    }

    public function getModules() {
        return $this->moduleDAO->getAll();
    }
}
?>
