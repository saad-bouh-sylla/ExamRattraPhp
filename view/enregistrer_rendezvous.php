
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Enregistrer un Rendez-vous</title>
</head>

<body>
    <h1>Enregistrer un Rendez-vous</h1>
    <form action="index.php?page=enregistrer_rendezvous" method="post">
        <label for="patient_id">Patient :</label>
        <select name="patient_id" id="patient_id">
            <?php foreach ($patients as $patient) : ?>
                <option value="<?= $patient->getId(); ?>"><?= $patient->getNomComplet(); ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="date_rendezvous">Date :</label>
        <input type="date" name="date_rendezvous" id="date_rendezvous"><br>
        <label for="heure_debut">Heure de début :</label>
        <input type="time" name="heure_debut" id="heure_debut"><br>
        <label for="heure_fin">Heure de fin :</label>
        <input type="time" name="heure_fin" id="heure_fin"><br>
        <input type="submit" value="Enregistrer">
    </form>
</body>

</html>
