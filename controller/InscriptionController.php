<?php

include '../racine/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_hirelink";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    $email = $_POST['email'] ?? '';
    $motdepasse = $_POST['motdepasse'] ?? '';
    $type_utilisateur = $_POST['type_utilisateur'] ?? '';

    if ($type_utilisateur == 'recruteur') {
        $stmt = $conn->prepare('SELECT * FROM recruteurs WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $recruteur = $stmt->fetch();

        if (!$recruteur) {
            $erreur = 'Cet email n\'existe pas.';
        } elseif (md5($recruteur['sel'] . $motdepasse) !== $recruteur['mot_de_passe']) {
            $erreur = 'Mot de passe incorrect.';
        } else {
            $_SESSION['type_utilisateur'] = $type_utilisateur;
            $_SESSION['email'] = $email;
            $_SESSION['nom'] = $recruteur['nom'];
            $_SESSION['prenom'] = $recruteur['prenom'];
            $_SESSION['pays'] = $recruteur['pays'];
            $_SESSION['ville'] = $recruteur['ville'];
            $_SESSION['sexe'] = $recruteur['sexe'];
            $_SESSION['telephone'] = $recruteur['telephone'];
            $_SESSION['nom_entreprise'] = $recruteur['nom_entreprise'];
            header('Location: ..frontend/recruteur.html');
            exit;
        }
    } elseif ($type_utilisateur == 'candidat') {
        $stmt = $conn->prepare('SELECT * FROM candidats WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $candidat = $stmt->fetch();

        if (!$candidat) {
            $erreur = 'Cet email n\'existe pas.';
        } elseif (md5($candidat['sel'] . $motdepasse) !== $candidat['mot_de_passe']) {
            $erreur = 'Mot de passe incorrect.';
        } else {
            $_SESSION['type_utilisateur'] = $type_utilisateur;
            $_SESSION['email'] = $email;
            $_SESSION['nom'] = $candidat['nom'];
            $_SESSION['prenom'] = $candidat['prenom'];
            $_SESSION['ville'] = $candidat['ville'];
            $_SESSION['pays'] = $candidat['pays'];
            $_SESSION['sexe'] = $candidat['sexe'];
            $_SESSION['telephone'] = $candidat['telephone'];
            $_SESSION['date_naissance'] = $candidat['date_naissance'];
            header('Location: ..frontend/candidat.html');
            exit;
        }
    } else {
        $erreur = 'Veuillez sélectionner votre type d\'utilisateur.';
    }

    $conn = null;
}
