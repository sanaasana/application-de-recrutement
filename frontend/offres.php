<?php
// Connexion à la base de données
include 'config/database.php';

// Récupérer les offres d'emploi depuis la base de données
$stmt = $pdo->query("SELECT * FROM offres_emploi");
$offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Afficher les offres d'emploi -->
<?php foreach ($offres as $offre) : ?>
<div class="offre">
    <div class="left-section">
        <h3 class="job-title"><b><?php echo $offre['titre_poste']; ?></b></h3>
        <h4 class="company"><?php echo $offre['nom_entreprise']; ?></h4>
        <p class="location"><i class="fas fa-map-marker-alt"></i> <?php echo $offre['lieu']; ?></p>
        <p class="date"><?php echo date("d-m-Y", strtotime($offre['date_poste'])); ?></p>
    </div>
    <div class="right-section">
        <p class="description"><?php echo $offre['descriptionn']; ?></p>
        <div class="details hidden">
            <h5>Responsabilités :</h5>
            <ul>
                <li><?php echo $offre['ResponsabilitÃ©']; ?></li>
            </ul>
            <h5>Exigences :</h5>
            <ul>
                <li><?php echo $offre['exigences']; ?></li>
            </ul>
        </div>
        <button class="show-details">PLUS</button>
        <button class="apply-button"><a href="connexion.html">Postuler</a></button>
    </div>
</div>
<?php endforeach; ?>
