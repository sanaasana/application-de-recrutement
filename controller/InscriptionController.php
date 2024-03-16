<?php
// Inclure le fichier de configuration de la base de données
include '../config/database.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['user_type']; // "candidate" ou "recruiter"

    // Insérer les données dans la table appropriée en fonction du type d'utilisateur
    if ($userType === "candidate") {
        $stmt = $pdo->prepare("INSERT INTO candidates (username, email, password) VALUES (?, ?, ?)");
    } elseif ($userType === "recruiter") {
        $stmt = $pdo->prepare("INSERT INTO recruiters (company_name, email, password) VALUES (?, ?, ?)");
    }

    // Exécuter la requête d'insertion
    $stmt->execute([$username, $email, $password]);

    // Rediriger l'utilisateur vers une page de succès ou de connexion
    header("Location: registration_success.php");
    exit();
}
?>
