<?php

namespace App\Controller;


use App\Database\DbUtils;

class Inscription
{
    /**
     * @param $post
     * @return string|true
     * cette méthode permet de gérer le formulaire d'inscription
     * elle sera automatiquement appelée par notre index.php à la ligne 22
     */
    public function validate($post)
    {
        if (!$post['username'] || !$post['password']) {
            return 'Identifiants invalides';
        } else {
            // sinon on enregistre notre utilisateur en base
            $query = Dbutils::getPdo()->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');
            $query->bindParam('username', $post['username']);

            // ici pour plus de sécurité on hash notre mot de passe afin de le protéger
            // et au cas ou ne pas garder le mdp en clair dans la base en cas de vol de données
            // on vérifie un mot de passe hashé via password_verify
            // test ~ $2y$10$NlGveXH/89avQCu/Umm2jeb7IYOvEKKwTRJjBVIrz9xLGIRCzYnQ.
            $password = password_hash($post['password'], PASSWORD_BCRYPT);

            $query->bindParam('password', $password);

            if (!$query->execute()) {
                return 'une erreur est survenue';
            } else {
                header('Location: /');
            }
        }
    }

    public function create() {
        // ici on récupère le chemin de notre fichier de template inscription.php
        return __DIR__.'/../../templates/inscription.php';
    }
}
