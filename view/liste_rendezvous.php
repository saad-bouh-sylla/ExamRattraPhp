<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Liste des Rendez-vous</title>
</head>

<body>
    <h1>Liste des Rendez-vous</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Date</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
        </tr>
        <?php foreach ($rendezVous as $rdv) : ?>
            <tr>
                <td><?= $rdv->getId(); ?></td>
                <td><?= $rdv->getPatient()->getNomComplet(); ?></td>
                <td><?= $rdv->getDateRendezVous(); ?></td>
                <td><?= $rdv->getHeureDebut(); ?></td>
                <td><?= $rdv->getHeureFin(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
