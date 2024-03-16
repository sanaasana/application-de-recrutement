<?php
$host = 'localhost'; // Adresse du serveur de base de données
$db_name = 'db_hirelink'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur de la base de données
$password = ''; // Mot de passe de la base de données

// Connexion à la base de données via PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Configuration supplémentaire si nécessaire
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connection success";
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
