<?php


$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base = "upp_recrutement";

// Connexion à la base de données MySQL
try {
    $bdd = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
    // Configuration de PDO pour qu'il lève des exceptions en cas d'erreur
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification de l'existence et de la validité des champs du formulaire
    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erreur = 'L\'adresse email est invalide !';
    } elseif (strlen($_POST['motdepasse']) < 6) {
        $erreur = 'Le mot de passe doit contenir au moins 6 caractères !';
    } elseif (!isset($_POST['nom']) || !isset($_POST['prenom'])) {
        $erreur = 'Le nom et le prénom sont obligatoires !';
    } elseif (!isset($_POST['ville']) || !isset($_POST['pays'])) {
        $erreur = 'La ville et le pays sont obligatoires !';
    } elseif (!isset($_POST['nom_entreprise'])) {
        $erreur = 'Le nom de l\'entreprise est obligatoires !';
    } elseif (!isset($_POST['tele']) || !preg_match("/^[0-9]{10}$/", $_POST['tele'])) {
        $erreur = 'Le numéro de téléphone est invalide (format attendu : 10 chiffres) !';
    } elseif (!isset($_POST['sexe']) || ($_POST['sexe'] !== 'Homme' && $_POST['sexe'] !== 'Femme')) {
        $erreur = 'Le sexe doit être spécifié (M ou F) !';
    } else {
        // Préparation de la requête SQL
        $req = $bdd->prepare('INSERT INTO recruteurs (email, mot_de_passe, nom, prenom, ville, pays, telephone, sexe, nom_entreprise) 
                           VALUES (:email,  MD5(:mot_de_passe), :nom, :prenom, :ville, :pays, :telephone, :sexe, :nom_entreprise)');

        // Exécution de la requête SQL avec les valeurs des champs du formulaire
        if ($req->execute(array(
            'email' => $_POST['email'],
            'mot_de_passe' => $_POST['motdepasse'],
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'ville' => $_POST['ville'],
            'pays' => $_POST['pays'],
            'telephone' => $_POST['tele'],
            'sexe' => $_POST['sexe'],
            'nom_entreprise' => $_POST['nom_entreprise']
        ))) {
            session_start();
            // Récupération du type d'utilisateur de la base de données
            $req_type_utilisateur = $bdd->prepare('SELECT type_utilisateur FROM recruteurs WHERE email = :email');
            $req_type_utilisateur->execute(array('email' => $_POST['email']));
            $resultat_req_type_utilisateur = $req_type_utilisateur->fetch(PDO::FETCH_ASSOC);

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['prenom'] = $_POST['prenom'];
            $_SESSION['ville'] = $_POST['ville'];
            $_SESSION['pays'] = $_POST['pays'];
            $_SESSION['telephone'] = $_POST['tele'];
            $_SESSION['sexe'] = $_POST['sexe'];
            $_SESSION['nom_entreprise'] = $_POST['nom_entreprise'];
            $_SESSION['type_utilisateur'] = $resultat_req_type_utilisateur['type_utilisateur'];


            header("Location: ../pages/dashboardrec.php");
        } else {
            echo "Erreur : l'insertion dans la base de données a échoué !";
        };
    }
}
