<?php
// Inclure le fichier de configuration de la base de données
include '../racine/config.php';

// Exemple de modèle utilisateur
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserById($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Autres méthodes du modèle utilisateur
}

// Créez une instance du modèle utilisateur en passant la connexion PDO
$userModel = new UserModel($pdo);
?>
