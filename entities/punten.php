<?php
class Punt {
    private $moduleID;
    private $persoonID;
    private $punt;

    public function __construct(int $moduleID, int $persoonID, int $punt) {
        $this->moduleID = $moduleID;
        $this->persoonID = $persoonID;
        $this->punt = $punt;
    }

    public function getModuleID(): int {
        return $this->moduleID;
    }

    public function getPersoonID(): int {
        return $this->persoonID;
    }

    public function getPunt(): int {
        return $this->punt;
    }
}
?>
