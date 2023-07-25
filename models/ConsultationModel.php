<?php


class ConsultationModel extends RendezVousModel {
    private $medecin;
    private $medicament;

    public function __construct($id, $date, $etat, $medecin, $medicament) {
        parent::__construct($id, $date, $etat);
        $this->medecin = $medecin;
        $this->medicament = $medicament;
    }

    // Getters and setters

    public function getMedecin() {
        return $this->medecin;
    }

    public function setMedecin($medecin) {
        $this->medecin = $medecin;
    }

    public function getMedicament() {
        return $this->medicament;
    }

    public function setMedicament($medicament) {
        $this->medicament = $medicament;
    }
}
