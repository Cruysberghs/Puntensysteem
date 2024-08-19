<?php
class Persoon {
    private $id;
    private $familienaam;
    private $voornaam;
    private $geboortedatum;
    private $geslacht;

    public function __construct(int $id, string $familienaam, string $voornaam, string $geboortedatum, string $geslacht) {
        $this->id = $id;
        $this->familienaam = $familienaam;
        $this->voornaam = $voornaam;
        $this->geboortedatum = $geboortedatum;
        $this->geslacht = $geslacht;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getFamilienaam(): string {
        return $this->familienaam;
    }

    public function getVoornaam(): string {
        return $this->voornaam;
    }

    public function getGeboortedatum(): string {
        return $this->geboortedatum;
    }

    public function getGeslacht(): string {
        return $this->geslacht;
    }
}
?>
