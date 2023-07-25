<?php



class RendezVousModel {
    private $id;
    private $date;
    private $etat;

    // enumeration 
    public const ANALYSE = "Analyse";
    public const RADIO = "Radio";

    public const EN_COURS = "En cours";
    public const ANNULE = "Annulé";

    public function __construct($id, $date, $etat) {
        $this->id = $id;
        $this->date = $date;
        $this->etat = $etat;
    }

    

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function insert($data=null):int{
        return parent::insert($this->dateProd);
     }
}
