<?php
// Inclure ici les fichiers pour les classes nécessaires
require_once '../models/ConsultationModel.php';
require_once '../models/PentientModel.php'; // Assurez-vous d'inclure la classe RendezVous s'il n'est pas déjà inclus
require_once '../models/PrestationModel.php';
require_once '../models/RendezVousModel.php'; 


class StockController
{
    private $patientService;

    public function __construct()
    {
        $this->patientService = new PatientService();
        // Si vous avez besoin de démarrer une session, vous pouvez l'initialiser ici
    }

    // Méthode pour ajouter un patient
    public function ajouterPatient()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];

            // Créer un objet Patient avec les données du formulaire
            $patient = new Patient($nom, $prenom, $date_naissance, $adresse, $telephone);

            // Ajouter le patient à la base de données
            $this->patientService->ajouterPatient($patient);

            // Rediriger vers la liste des patients
            header('Location: index.php?page=liste_patients');
            exit();
        }

        // Charger le formulaire d'ajout de patient
        require_once 'views/ajouter_patient.php';
    }

    // Méthode pour afficher la liste des patients
    public function listerPatients()
    {
        $patients = $this->patientService->listerPatients();

        // Afficher la liste des patients
        require_once 'views/liste_patients.php';
    }

    // Méthode pour supprimer un patient
    public function supprimerPatient()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Supprimer le patient de la base de données
            $this->patientService->supprimerPatient($id);

            // Rediriger vers la liste des patients
            header('Location: index.php?page=liste_patients');
            exit();
        }
    }

    // Méthode pour modifier un patient
    public function modifierPatient()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];

            // Créer un objet Patient avec les données du formulaire
            $patient = new Patient($nom, $prenom, $date_naissance, $adresse, $telephone);
            $patient->setId($id); // Assurez-vous que votre classe Patient a une méthode setId

            // Mettre à jour le patient dans la base de données
            $this->patientService->modifierPatient($patient);

            // Rediriger vers la liste des patients
            header('Location: index.php?page=liste_patients');
            exit();
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Récupérer le patient à partir de la base de données
            $patient = $this->patientService->rechercherPatientParId($id);

            // Afficher le formulaire de modification du patient
            require_once 'views/modifier_patient.php';
        }
    }

   

    public function enregistrerRendezVous()
    {
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $patientId = $_POST['patient_id'];
        $dateRendezVous = $_POST['date_rendezvous'];
        $heureDebut = $_POST['heure_debut'];
        $heureFin = $_POST['heure_fin'];

        // Créer un objet RendezVous avec les données du formulaire
        $rendezVous = new RendezVous($patientId, $dateRendezVous, $heureDebut, $heureFin);

        // Ajouter le rendez-vous à la base de données
        $this->rendezVousService->enregistrerRendezVous($rendezVous);

        // Rediriger vers la liste des rendez-vous
        header('Location: index.php?page=liste_rendezvous');
        exit();
      } 

     
        $patients = $this->patientService->listerPatients();
        require_once 'views/enregistrer_rendezvous.php';
   }

    
    public function listerRendezVous()
    {
        $rendezVous = $this->rendezVousService->listerRendezVous();

        // Afficher la liste des rendez-vous
        require_once 'views/liste_rendezvous.php';
    }
}
