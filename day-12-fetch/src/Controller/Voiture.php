<?php

namespace App\Controller;

use App\Database\Dbutils;
use PDO;

class Voiture
{
    public function list(): array
    {
        $query = Dbutils::getPdo()->prepare('SELECT * FROM voiture');
        $query->execute();

        $voitures = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!$voitures) {
            return [
                'success' => false,
                'message' => 'Aucune voiture présente dans la base',
                'data' => null
            ];
        }

        return [
            'success' => true,
            'message' => '',
            'data' => $voitures
        ];
    }

    public function show(int $id): array
    {
        $query = Dbutils::getPdo()->prepare('SELECT * FROM voiture WHERE id = :id');
        $query->bindParam('id', $id);
        $query->execute();

        $voiture = $query->fetch(PDO::FETCH_ASSOC);

        if (!$voiture) {
            return [
              'success' => false,
              'message' => 'La voiture n\'a pas été trouvée',
              'data' => null
            ];
        }

        return [
            'success' => true,
            'message' => '',
            'data' => $voiture
        ];
    }

    public function create(array $data): array
    {
        return $this->manageVoiturePost($data);
    }

    public function edit(int $id, array $data): array
    {
        return $this->manageVoiturePost($data, $id);
    }

    public function delete(int $id)
    {
        $query = Dbutils::getPdo()->prepare('DELETE FROM voiture WHERE id = :id');
        $query->bindParam('id', $id);

        if (!$query->execute()) {
            return [
                'success' => false,
                'message' => 'Une erreur est survenue, merci de rééssayer',
                'data' => null
            ];
        }

        return [
            'success' => true,
            'message' => 'La voiture a été supprimée',
            'data' => null
        ];
    }

    // peremttra de gérer le create et update de la voiture
    private function manageVoiturePost(array $data, ?int $id = null)
    {
        //gérer la validation des infos
        if (count($data) !== 7) {
            return [
                'success' => false,
                'message' => 'Paramètre manquant dans le formulaire',
                'data' => $data
            ];
        }

        if ($id) {
            //edit
            $query = Dbutils::getPdo()->prepare('UPDATE voiture SET
                immatriculation = :immatriculation,
                marque = :marque,
                annee = :annee,
                modele = :modele,
                km = :km,
                type_motorisation = :type_motorisation,
                etat = :etat
                WHERE id = :id
            ');
        } else {
            // dans le create car pas d'id existant
            $query = Dbutils::getPdo()->prepare('INSERT INTO voiture
                (immatriculation, marque, annee, modele, km, type_motorisation, etat)
                VALUES (
                    :immatriculation,
                    :marque,
                    :annee,
                    :modele,
                    :km,
                    :type_motorisation,
                    :etat
                )
            ');
        }

        $query->bindParam('immatriculation', $data['immatriculation']);
        $query->bindParam('marque', $data['marque']);
        $query->bindParam('annee', $data['annee']);
        $query->bindParam('modele', $data['modele']);
        $query->bindParam('km', $data['km']);
        $query->bindParam('type_motorisation', $data['type_motorisation']);
        $query->bindParam('etat', $data['etat']);

        $message = 'La voiture a été créée';
        if ($id) {
            $query->bindParam('id', $id);
            $message = 'La voiture a été modifiée';
        }

        if (!$query->execute()) {
            return [
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'enregistrement. Merci de rééssayer',
                'data' => $data
            ];
        }

        if (!$id) {
            $queryId = Dbutils::getPdo()->query('SELECT max(id) as voiture_id FROM voiture');
            $queryId->execute();
            $voitureInsertId = $queryId->fetch(PDO::FETCH_ASSOC);

            $data['voiture_id_insert'] = $voitureInsertId['voiture_id'];
        }

        return  [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];
    }
}
