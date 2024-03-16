<?php
// Inclure le fichier de configuration de la base de données
include '../config/database.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $idRecruteur = $_POST['id_recruteur'];
    $nomEntreprise = $_POST['nom_entreprise'];
    $lieu = $_POST['lieu'];
    $titrePoste = $_POST['titre_poste'];
    $description = $_POST['descriptionn'];
    $responsabilites = $_POST['Responsabilité'];
    $exigences = $_POST['exigences'];

    // Insérer les données dans la table offres_emploi
    $stmt = $pdo->prepare("INSERT INTO offres_emploi (id_recruteur, nom_entreprise, lieu, titre_poste, descriptionn, ResponsabilitÃ©, exigences) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$idRecruteur, $nomEntreprise, $lieu, $titrePoste, $description, $responsabilites, $exigences]);

    // Rediriger l'utilisateur vers la page des offres
    header("Location: offres.html");
    exit();
}
?>
