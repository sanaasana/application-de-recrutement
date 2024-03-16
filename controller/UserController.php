<?php
// Exemple de contrôleur utilisateur
class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function getUserProfile($userId) {
        $user = $this->userModel->getUserById($userId);
        // Charger la vue pour afficher le profil utilisateur avec les données récupérées
    }

    // Autres méthodes du contrôleur utilisateur
}

// Créez une instance du contrôleur utilisateur en passant le modèle utilisateur
$userController = new UserController($userModel);
?>
