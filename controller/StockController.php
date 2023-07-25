<?php

require_once '../models/ConsultationModel.php';
require_once '../models/PentientModel.php'; 
require_once '../models/PrestationModel.php';
require_once '../models/RendezVousModel.php'; 


class StockController
{
    private $patientService;

    public function __construct()
    {
        $this->patientService = new PatientService();
      
    }

    
    public function ajouterPatient()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];

            
            $patient = new Patient($nom, $prenom, $date_naissance, $adresse, $telephone);

            
            $this->patientService->ajouterPatient($patient);

            
            header('Location: index.php?page=liste_patients');
            exit();
        }

        
        require_once 'views/ajouter_patient.php';
    }

    
    public function listerPatients()
    {
        $patients = $this->patientService->listerPatients();

        
        require_once 'views/liste_patients.php';
    }

   
    public function supprimerPatient()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

           
            $this->patientService->supprimerPatient($id);

            
            header('Location: index.php?page=liste_patients');
            exit();
        }
    }

  
    public function modifierPatient()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];

           
            $patient = new Patient($nom, $prenom, $date_naissance, $adresse, $telephone);
            $patient->setId($id); 

            
            $this->patientService->modifierPatient($patient);

           
            header('Location: index.php?page=liste_patients');
            exit();
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            
            $patient = $this->patientService->rechercherPatientParId($id);

            
            require_once 'views/modifier_patient.php';
        }
    }

   

    public function enregistrerRendezVous()
    {
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $patientId = $_POST['patient_id'];
        $dateRendezVous = $_POST['date_rendezvous'];
        $heureDebut = $_POST['heure_debut'];
        $heureFin = $_POST['heure_fin'];

        
        $rendezVous = new RendezVous($patientId, $dateRendezVous, $heureDebut, $heureFin);

        
        $this->rendezVousService->enregistrerRendezVous($rendezVous);

        
        header('Location: index.php?page=liste_rendezvous');
        exit();
      } 

     
        $patients = $this->patientService->listerPatients();
        require_once 'views/enregistrer_rendezvous.php';
   }

    
    public function listerRendezVous()
    {
        $rendezVous = $this->rendezVousService->listerRendezVous();

        
        require_once 'views/liste_rendezvous.php';
    }
}
