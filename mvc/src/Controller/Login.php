<?php

namespace App\Controller;

use App\Database\Dbutils;
use PDO;

class Login
{
    public function show()
    {
        return [
            'template' => 'user/login',
        ];
    }

    public function logout()
    {
        unset($_SESSION['user']);

        header('Location: /');
    }

    public function validate(array $data)
    {
        if (!$data['username'] || !$data['password']) {
            return [
                'success' => false,
                'template' => 'user/login',
                'message' => 'Identifiants invalides',
            ];
        } else {
            // ici on va récupérer notre utilisateur uniquement avec un username car le mot de passe est hashé en base de données
            // donc on ne peut pas le retrouver. On fera la vérification par la suite du mdp
            $query = Dbutils::getPdo()->prepare('SELECT * FROM user WHERE username = :username');
            $query->bindParam('username', $data['username']);
            $query->execute();

            $user = $query->fetch(PDO::FETCH_ASSOC);

            // si pas d'utilisateur avec ce username en base définie notre erreur
            if (!$user) {
                return [
                    'success' => false,
                    'template' => 'user/login',
                    'message' => 'Identifiants invalides',
                ];
            } else {
                //si utilisateur trouvé alors on vérifie que le mot de passe tapé dans le formulaire corresponde bien à celui hashé en bdd
                $passwordOk = password_verify($data['password'], $user['password']);

                // si pas ok erreur
                if (!$passwordOk) {
                    return [
                        'success' => false,
                        'template' => 'user/login',
                        'message' => 'Identifiants invalides',
                    ];
                } else {
                    unset($user['password']);
                    $_SESSION['user'] = $user;

                    // si ok on redirige
                    header('Location: /');
                }
            }
        }
    }
}
