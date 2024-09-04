<?php

namespace App\Controller;


use App\Database\Dbutils;

class Inscription
{
    /**
     * @param $data
     * @return array|void
     * cette méthode permet de gérer le formulaire d'inscription
     * elle sera automatiquement appelée par notre index.php à la ligne 22
     */
    public function validate(array $data)
    {
        if (!$data['username'] || !$data['password']) {
            return [
                'success' => false,
                'template' => 'inscription',
                'message' => 'Identifiants invalides',
            ];
        } else {
            // sinon on enregistre notre utilisateur en base
            $query = Dbutils::getPdo()->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');
            $query->bindParam('username', $data['username']);

            // ici pour plus de sécurité on hash notre mot de passe afin de le protéger
            // et au cas ou ne pas garder le mdp en clair dans la base en cas de vol de données
            // on vérifie un mot de passe hashé via password_verify
            // test ~ $2y$10$NlGveXH/89avQCu/Umm2jeb7IYOvEKKwTRJjBVIrz9xLGIRCzYnQ.
            $password = password_hash($data['password'], PASSWORD_BCRYPT);

            $query->bindParam('password', $password);

            if (!$query->execute()) {
                return [
                    'success' => false,
                    'template' => 'inscription',
                    'message' => 'une erreur est survenue',
                ];
            } else {
                $_SESSION['success_message'] = 'Compte créé avec success';

                header('Location: /');
            }
        }
    }

    public function create() {
        // ici on récupère le chemin de notre fichier de template inscription.php
        return [
            'template' => 'inscription',
        ];
    }
}
